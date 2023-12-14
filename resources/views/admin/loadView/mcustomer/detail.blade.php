@extends('layouts.index')
@section('content')
<div class="main-content-inner">
            <div class="profile_page">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cover-profile">
                            <div class="profile-bg-img" style="background: url('/admin/images/lock-bg.jpg') no-repeat;">
                                <div class="card-block user-info">
                                    <div class="col-md-12">
                                        <div class="media-left">
                                            <a href="#" class="profile-image">
                                                <img class="user-img img-radius" src="{{$customer->image}}" width="100" height="100" alt="user-img">
                                            </a>
                                        </div>
                                        <div class="media-body row">
                                            <div class="col-lg-12">
                                                <div class="user-title">
                                                    <h2>{{$customer->name}}</h2>
                                                  
                                                </div>
                                            </div>
                                            <div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                     
                        <div class="tab-content">
                            <div class="tab-pane active" aria-expanded="true">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card_title mb-0">Giới thiệu</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="view-info">
                                            <div class="general-info">
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table m-0">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">Tên </th>
                                                                    <td>{{ $customer->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Giới tính</th>
                                                                    <td>{{ $customer->sex }}</td>
                                                                </tr>                                                                                                                             
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">Email</th>
                                                                    <td><a href="#!">{{ $customer->email }}</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">SĐT</th>
                                                                    <td>{{ $customer->mobiephone }}</td>
                                                                </tr>
                                                               
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                               
                            </div>
                          
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection