@extends('layouts.admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="docs-demo">
                    <div class="img-container">
                        <img src="{{asset('assets/admin/cropper/images/picture2.jpg')}}" alt="Picture">
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 15%;">
                <p style="text-align:center">
                    پیش نمایش
                </p>
                <div class="docs-preview clearfix">
                    <div class="img-preview preview-lg"></div>
                </div>
            </div>
        </div>
        <div class="row" id="actions">
            <div class="col-md-9 docs-buttons">
                <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
				<span class="docs-tooltip" data-toggle="tooltip" title="cropper.reset()">
					تنظیم مجدد
				</span>
                </button>
                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">
                    دانلود تصویر
                </a>
                <button type="button" class="btn btn-success" data-method="getCroppedCanvas"
                        data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
				<span class="docs-tooltip" data-toggle="tooltip"
                      title="cropper.getCroppedCanvas({ maxWidth: 4096, maxHeight: 4096 })">
					ساخت تصویر
				</span>
                </button>
                <div class="btn-group">
                    <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                        <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                        <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
						آپلود تصویر
					</span>
                    </label>
                </div>
            </div>
            <div class="col-md-3 docs-toggles"></div>
        </div>
    </div>

@stop
