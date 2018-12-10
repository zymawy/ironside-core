@extends('ironside::layouts.dashboard.app')

@section('styles')
    <style>
        .cropper-container {
            text-align: center;
        }

        .cropper-box {
            margin: auto;
            min-height: 500px;
        }

        .preview {
            width: 100%;
            margin: auto;
            overflow: hidden;
            min-height: 200px;
            /*border: 1px solid #444444;*/
        }
    </style>
@endsection

@section('content')
    <div class="row cropper-container">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-crop"></i></span>
                        <span>Crop {{ $photoable->name }}</span>
                    </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Current Thumb</h4>
                            <img src="{{ $photoable->thumb_url }}" title="{{ $photoable->name }}" style="max-width: 100%;">
                        </div>

                        <div class="col-md-6">
                            <div class="cropper-box">
                                <h4>Crop</h4>
                                <img id="image-cropper" src="{{ $photoable->original_url }}" title="{{ $photoable->name }}" style="max-width: 100%;">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <h4>Preview</h4>
                            <div class="preview"></div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button id="btn-crop-photo" class="btn btn-labeled btn-primary btn-ajax-submit">
                            <span class="btn-label"><i class="fa fa-fw fa-save"></i></span>
                            Update Photo
                        </button>

                        <a href="javascript:window.history.back();" class="btn btn-labeled btn-default">
                            <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            var cropperData = false;
            var $image = $('#image-cropper');

            var minCropWidth = 0;
            var minCropHeight = 0;
            var minWidth = {{ isset($photoable::$THUMB_SIZE)? $photoable::$THUMB_SIZE[0]:400 }};
            var minHeight = {{ isset($photoable::$THUMB_SIZE)? $photoable::$THUMB_SIZE[1]:200 }};

            $image.cropper({
                // viewMode: 1, // restrict the crop box to not exceed the size of the canvas.
                preview: '.preview',
                aspectRatio: minWidth / minHeight,
                ready: function () {
                    cropperData = $(this).cropper('getData', true);
                    // add restrictions when natural image is bigger than minimum allowed
                    if (cropperData.width > minWidth && cropperData.height > minHeight) {
                        // get the original cropbox data
                        var originalBoxData = $image.cropper('getCropBoxData');
                        // set the crop area to minimum image size
                        $image.cropper('setData', {
                            width: minWidth,
                            height: minHeight
                        });
                        // set the minimum cropbox width and height
                        var cropBoxData = $image.cropper('getCropBoxData');
                        minCropWidth = cropBoxData.width;
                        minCropHeight = cropBoxData.height;
                        // reset the cropbox area to initialize
                        $image.cropper('setCropBoxData', {
                            width: originalBoxData.width,
                            height: originalBoxData.height,
                        });
                    } else {
                        notifyError("Image Size", "The image uploaded is smaller than the minimum required size.");
                    }
                },
                crop: function (e) {
                    // console.log(e.x);
                    // console.log(e.y);
                    // console.log(e.width);
                    // console.log(e.height);

                    // get crop data - round to integer
                    cropperData = $(this).cropper('getData', true);
                },
                cropmove: function (e) {
                    if (minCropWidth > 0) {
                        var imageData = $image.cropper('getData', true);

                        // if image width is less than minimum
                        if (imageData.width < minWidth) {
                            $image.cropper('setCropBoxData', {
                                width: minCropWidth
                            });
                        }

                        // if image height is less than minimum
                        if (imageData.height < minHeight) {
                            $image.cropper('setCropBoxData', {
                                height: minCropHeight
                            });
                        }
                    }
                }
            });

            $('#btn-crop-photo').click(function (e) {
                e.preventDefault();

                cropperData['photoable_id'] = "{{ $photoable->id }}";
                cropperData['photoable_type'] = "{{ str_replace('\\','\\\\',get_class($photoable)) }}";
                cropperData['photoable_type_name'] = "{{ (new \ReflectionClass($photoable))->getShortName() }}";

                doAjax("/dashboard/photos/crop-resource", cropperData, function (response) {
                    BUTTON.reset('.btn-ajax-submit');

                    if (response.error) {
                        notifyError(response.error.title, response.error.content);
                    } else {
                        notify('Cropped', 'The photo was successfully cropped.', 'success', 'fa fa-smile-o bounce animated', 5000);
                    }
                });
            })
        })
    </script>
@endsection