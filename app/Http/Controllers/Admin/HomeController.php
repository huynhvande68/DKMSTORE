<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use App\Models\Admin\Blog;
use App\Models\Admin\Statiscial;
use App\Models\Admin\Transaction;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use PDO;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        $kq = Transaction::whereMonth('created_at', '=', Carbon::now()->month)->get();
        // $kq_month = Transaction::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get(); 
        $month = Carbon::now()->month;
        $dem_month = 0;
        $dem_no = 0;
        $all = 0;
        $status = 0;
        $huy = 0;
        foreach ($kq as $item) {
            $status += 1;
            if ($item->status == 1) {
                $dem_month += 1;
                $all += $item->tranor->total_discount;
            }
            if ($item->status == 0) {
                $dem_no += 1;
            }
            if ($item->status == 2) {
                $huy += 1;
            }
        }
        $blog = Blog::get();
        return view('admin.loadView.categories.index', compact('dem_month', 'dem_no', 'all', 'status', 'month', 'huy', 'blog'));
    }

    public function statiscialDay(Request $request)
    {
        $res = Statiscial::whereBetween('period', [$request->form, $request->to])->orderBy('period', 'ASC')->get();

        foreach ($res as $key => $item) {

            $chart_array[] = array(
                'period' => $item->period,
                'quantity' => $item->total_quantity,
                'price' => $item->total_price
            );
        }
        return response()->json([
            'code' => 200,
            'main' =>  $chart_array
        ], 200);
    }

    public function load()
    {
        // Carbon::parse($day->created_at)->format('Y/m/d')
        // dd(Carbon::now()->startOfMonth()->subMonth()->toDateTimeString());
        $day60 =  Statiscial::whereMonth('period', '=', Carbon::now()->startOfMonth()->subMonth())->orderBy('period', 'ASC')->get();
        foreach ($day60 as $key => $item) {

            $chart_array[] = array(
                'period' => $item->period,
                'quantity' => $item->total_quantity,
                'price' => $item->total_price
            );
        }
        return response()->json([
            'code' => 200,
            'main' =>  $chart_array
        ], 200);
    }

    public function load_dount()
    {
        $blog = Blog::get();
        $allview = 0;
        foreach ($blog as $item) {
            $allview += $item->care_product;
        }
        $all_view_blog = $allview;
        $blog_max_view = Blog::select('name_blog')->max('care_product');

        $chart_array[] = array();
        $chart_array[0] = array(
            'label' => 'Tổng số lượt truy cập ',
            'value' => $all_view_blog,
        );
        $chart_array[1] = array(
            'label' => 'Số view cao nhất trong 1 bài',
            'value' => $blog_max_view,
        );

        return response()->json([
            'code' => 200,
            'main' =>  $chart_array
        ], 200);
    }
}
