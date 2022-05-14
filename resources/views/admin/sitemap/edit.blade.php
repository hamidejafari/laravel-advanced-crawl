@extends('layouts.admin.master')
@section('title','سایت مپ')
@section('content')
    <div class="col-md-10 mx-auto">
        <h3 class="bg-white py-2 px-4 rounded-lg">
            ویرایش
        </h3>
        <form method="post" action="{{URL::action('Admin\SettingController@postEditSitemap',$data->id)}}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card rounded-lg p-3 overflow-auto">
                <div class="row">
                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                            <label>عنوان سایت مپ :</label>
                            <input class="form-control" type="text" name="sitemap"
                                   value="@if(isset($data->sitemap)){{$data->sitemap}}@endif">
                        </div>
                    </div>
                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                            <label>مدت زمان :</label>
                            <select class="form-control" name="sitemaptime">
                                <option value="daily" @if(isset($data) && $data->
								sitemaptime=='daily') selected @endif> روزانه
                                </option>
                                <option value="weekly" @if(isset($data) && $data->
								sitemaptime=='weekly') selected @endif>هفتگی
                                </option>
                                <option value="monthly" @if(isset($data) && $data->
								sitemaptime=='monthly') selected @endif>ماهانه
                                </option>
                                <option value="yearly" @if(isset($data) && $data->
								sitemaptime=='yearly') selected @endif>سالانه
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                    
                            <div class="form-group">
                                <label>priority :</label>
                                <input name="priority" type="text" class="form-control" placeholder="تایپ کنید..."value ="@if(isset($data->priority)){{$data->priority}}@endif">
                            </div>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 p-2">
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" value="1" @if(isset($data->sitemapactive) &&
							$data->sitemapactive === 1) checked= "checked"
                                       @endif
                                       name="sitemapactive">
                                <label>
                                    فعال شود
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" value="1" @if(isset($data->sitemapimg) &&
							$data->sitemapimg === 1) checked= "checked"
                                       @endif
                                       name="sitemapimg">
                                <label>
                                    شامل تصویر شود
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 p-2">
                        <div class="form-group">
                            <input class="btn btn-lg btn-success" type="submit" value="ذخیره">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
