<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Coupon;
use App\Http\Requests\RequestCoupon;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $coupons = Coupon::get();
        foreach ($coupons as $couItem) {

            $coupon_condition = $this->checkday($couItem->day_start, $couItem->day_end);
            Coupon::find($couItem->id)->update([
                'coupon_condition' => $coupon_condition
            ]);
        }
        $coupon = Coupon::paginate(6);
        return view('admin.loadView.coupon.index', compact('coupon'));
    }

    public function create()
    {
        return view('admin.loadView.coupon.create');
    }
    public function store(RequestCoupon $request)
    {

        $coupon_begin = Carbon::parse($request->coupon_begin)->toDateTimeString();
        $coupon_end = Carbon::parse($request->coupon_end)->toDateTimeString();
        if ($coupon_begin >= $coupon_end) {
            return redirect()->back()->with('warning', 'Vui lòng nhập ngày bắt đầu < ngày kết thúc');
        } else {
            $coupon_condition = $this->checkday($coupon_begin, $coupon_end);
        }
        $random = Str::random(7);
        $coupon_code = Str::of($random)->upper();
        $detail = Str::of($request->coupon_detail)->replace('.', '');
        // echo $coupon_begin->format('Y-m-d h:i:s');
        //   echo   Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        $res = Coupon::create([
            'coupon_name' => $request->coupon_name,
            'coupon_number' => $request->coupon_number,
            'coupon_condition' => $coupon_condition,
            'coupon_detail' => $detail,
            'coupon_code' => $coupon_code,
            'coupon_select' => $request->coupon_select,
            'day_start' => $coupon_begin,
            'day_end' =>  $coupon_end
        ]);
        if ($res) {
            return redirect()->route('admin.coupon.show')->with('success', 'thêm mã giảm giá thành công');
        }
    }

    public function edit($id)
    {
        $edit_coupon = Coupon::find($id);

        return view('admin.loadView.coupon.edit', compact('edit_coupon'));
    }

    public function update(RequestCoupon $request, $id)
    {

        $coupon_begin = Carbon::parse($request->coupon_begin)->toDateTimeString();
        $coupon_end = Carbon::parse($request->coupon_end)->toDateTimeString();
        if ($coupon_begin >= $coupon_end) {
            return redirect()->back()->with('warning', 'Vui lòng nhập ngày bắt đầu < ngày kết thúc');
        } else {
            $coupon_condition = $this->checkday($coupon_begin, $coupon_end);
        }
        $random = Str::random(7);
        $coupon_code = Str::of($random)->upper();
        $detail = Str::of($request->coupon_detail)->replace('.', '');
        // echo $coupon_begin->format('Y-m-d h:i:s');
        //   echo   Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        $res = Coupon::find($id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_number' => $request->coupon_number,
            'coupon_condition' => $coupon_condition,
            'coupon_detail' => $detail,
            'coupon_code' => $coupon_code,
            'coupon_select' => $request->coupon_select,
            'day_start' => $coupon_begin,
            'day_end' =>  $coupon_end
        ]);
        if ($res) {
            return redirect()->route('admin.coupon.show')->with('success', 'cập nhật mã giảm giá thành công');
        }
    }

    public function delete($id)
    {

        $cc = Coupon::find($id)->delete();
        $coupons = Coupon::get();
        foreach ($coupons as $couItem) {
            $coupon_condition = $this->checkday($couItem->day_start, $couItem->day_end);
            Coupon::find($couItem->id)->update([
                'coupon_condition' => $coupon_condition
            ]);
        }
        $coupon = Coupon::paginate(6);
        $cartComponent = view('admin.loadView.coupon.recusive_index', compact('coupon'))->render();
        return response()->json([
            'code' => 200,
            'cartComponent' => $cartComponent,
            'message' => 'Đã thêm vào giỏ hàng'

        ], 200);
    }

    public function check(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->val)->first();
        if (isset($coupon) && ($coupon->coupon_number > 0)) {
            if (Carbon::now('Asia/Ho_Chi_Minh') >  $coupon->day_end) {
                $coupon_condition = 0;
                return response()->json([
                    'code' => 200,
                    'message' => $coupon_condition,

                ], 200);
            }
            if (Carbon::now('Asia/Ho_Chi_Minh') <  $coupon->day_start) {
                $coupon_condition = -1;
                return response()->json([
                    'code' => 200,
                    'message' => $coupon_condition,

                ], 200);
            }
            if (Carbon::now('Asia/Ho_Chi_Minh') < $coupon->day_end && Carbon::now('Asia/Ho_Chi_Minh') > $coupon->day_start) {
                $coupon_condition = 1;
                $select_code = $coupon->coupon_select;
                $detail = $coupon->coupon_detail;
                $number = $coupon->coupon_number - 1;
                $qrcode = $coupon->coupon_code;
                // update
                Coupon::find($coupon->id)->update([
                    'coupon_number' => $number
                ]);

                return response()->json([
                    'code' => 200,
                    'message' => $coupon_condition,
                    'detail' =>  $detail,
                    'select_code' =>  $select_code,
                    'qr_code' =>  $qrcode

                ], 200);
            }
        } else {
            return response()->json([
                'code' => 200,
                'message' => 3,

            ], 200);
        }
    }

    public function checkday($start, $end)
    {
        if (Carbon::now('Asia/Ho_Chi_Minh') >   $end) {
            $coupon_condition = 0;
        }
        if (Carbon::now('Asia/Ho_Chi_Minh') <  $start) {
            $coupon_condition = -1;
        }
        if (Carbon::now('Asia/Ho_Chi_Minh') < $end && Carbon::now('Asia/Ho_Chi_Minh') > $start) {
            $coupon_condition = 1;
        }
        return $coupon_condition;
    }
}
