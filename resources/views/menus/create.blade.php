@extends('layouts.app')

@section('content')
<h1>Create</h1>
<form enctype="multipart/form-data" method="POST">
    @csrf
    <div class="container-fluid p-3">
        {{-- <div class="row">
            <div class="col-12">
                <div class="upload__box">
                    <div class="upload__img-wrap"></div>
                    <div class="upload__btn-box">
                        <label class="upload__btn">
                            <p>Upload images</p>
                            <input type="file" multiple name="photo[]" data-max_length="8" class="upload__inputfile">
                        </label>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <input type="file" class="filepond" name="filepond" multiple data-max-file-size="300MB"
                data-max-files="5" />
        </div>
        <div class="row">
            <div class="col-6">
                <input type="text" name="english_name" placeholder="Item Name EN" class="form-control">
            </div>
            <div class="col-6">
                <input type="text" name="myanmar_name" placeholder="Item Name MM" class="form-control">
            </div>
            <div class="col-12 mt-2">
                <textarea placeholder="Short Description" name="description" class="form-control"></textarea>
            </div>
            <div class="col-6 mt-2">
                <select class="form-control" name="menu_category_id">
                    <option value="">Category</option>
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
            </div>
            <div class="col-6 mt-2">
                <select class="form-control" name="is_variant" id="add-additional-item">
                    <option value="simple">Simple</option>
                    <option value="varient1">Varient</option>
                    <option value="">2</option>
                </select>
            </div>
            <div class="col-6 mt-2">
                <input type="number" name="basic_price" placeholder="Basic Price" class="form-control">
            </div>
            <div class="col-6 mt-2">
                <input type="number" name="cook_time" placeholder="Cook Time" class="form-control">
            </div>
            <div class="col-12 mt-2" id="dynamicDiv">
                <div class=' mt-3 card p-3 ' id="add-item-form">
                    <div class='row'>
                        <div class='col-md-3'><input class='form-control' placeholder='Group Title'></div>
                        <div class='col-md-3'>
                            <div class='form-check'><input class='form-check-input' type='checkbox'
                                    id='defaultCheck1'><label class='form-check-label'
                                    for='defaultCheck1'>Require</label>
                            </div>
                        </div>
                        <div class='col-md-3'>
                            <div class='form-check form-check-inline'><input class='form-check-input' type='radio'
                                    name='inlineRadioOptions' id='inlineRadio1' value='option1'><label
                                    class='form-check-label' for='inlineRadio1'>Multi Choice</label></div>
                        </div>
                        <div class='col-md-3'>
                            <div class='form-check form-check-inline'><input class='form-check-input' type='radio'
                                    name='inlineRadioOptions' id='inlineRadio2' value='option2'><label
                                    class='form-check-label' for='inlineRadio2'>Single Choice</label></div>
                        </div>
                    </div>

                    <div class='row mt-2 plus-item'>
                        <div class='col-md-3 '>
                            <input class='form-control'>
                        </div>
                        <div class='col-md-3'>
                            <input type='number' class='form-control'>
                        </div>
                        <div class='col-md-3'>
                            <input class='form-control' placeholder='Additional Cooking Time'>
                        </div>
                        <div class='col-md-3'>
                            <div class='btn btn-danger delete-additional-item'>Remove</div>
                        </div>
                    </div>
                    <div class="add-next-item">

                    </div>
                    <div class='row mt-2'>
                        <div class='col-md-3'>
                            <input class='form-control'>
                        </div>
                        <div class='col-md-3'>
                            <input type='number' class='form-control'>
                        </div>
                        <div class='col-md-3'>
                            <input class='form-control' placeholder='Additional Cooking Time'>
                        </div>
                        <div class='col-md-3'>
                            <div class='btn btn-success add-more-item'>Add</div>
                        </div>
                    </div>

                    <div class='col-md-6 mx-auto mt-3 ' style="text-align: center;">
                        <div id='varient' style="width:100px;" class='btn btn-primary'>Plus</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto mt-3">
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input cursor-pointer" name="status"
                            id="customSwitches">
                        <label class="custom-control-label" for="customSwitches">Active</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary text-dark" style="width: 300px">Create
                    Menu</button>
            </div>
        </div>
    </div>
</form>


@push('scripts')
<script>
    var i = 0;
            $("#varient").click(function() {
                ++i;
                $("#dynamicDiv").append(
                    "<div class='card p-3 2nd-form'><div class=' mt-3 '><div class='row'><div class='col-md-3'><input class='form-control' placeholder='Group Title'></div><div class='col-md-3'><div class='form-check'><input class='form-check-input' type='checkbox' id='defaultCheck1'><label class='form-check-label' for='defaultCheck1'>Require</label></div></div><div class='col-md-3'><div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio1' value='option1'><label class='form-check-label' for='inlineRadio1'>Multi Choice</label></div></div><div class='col-md-3'><div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio2' value='option2'><label class='form-check-label' for='inlineRadio2'>Single Choice</label></div></div></div><div class='row mt-2 plus-item'><div class='col-md-3'><input class='form-control' ></div><div class='col-md-3'><input type='number' class='form-control' ></div><div class='col-md-3'><input class='form-control' placeholder='Additional Cooking Time'></div><div class='col-md-3'><div class='btn btn-danger delete-additional-item'>Remove</div></div></div><div class='additional-item2'></div><div class='row mt-2'><div class='col-md-3'><input class='form-control' ></div><div class='col-md-3'><input type='number' class='form-control' ></div><div class='col-md-3'><input class='form-control' placeholder='Additional Cooking Time'></div><div class='col-md-3  add-more-item2'><div class='btn btn-success'>Add</div></div></div></div></div>"
                );
            });
            $(document).on('click', '.delete-additional-item', function() {
                $(this).closest('.plus-item').remove();
            });
            $(document).on('click', '.delete-next-item2', function() {
                $(this).closest('.add-next-item2').remove();
            });
            $(document).on('click', '.add-more-item2', function() {
                ++i;
                $('.additional-item2').append(
                    "<div class='row mt-2 add-next-item2'><div class='col-md-3'><input class='form-control'></div><div class='col-md-3'><input type='number' class='form-control'></div><div class='col-md-3'><input class='form-control' placeholder='Additional Cooking Time'></div><div class='col-md-3'><div class='btn btn-danger delete-next-item2'>Remove</div></div></div>"
                )
            })
</script>
<script>
    $('#add-item-form').hide();
            $('#add-additional-item').change(function() {
                if ($('#add-additional-item').val() == 'varient1') {
                    $('#add-item-form').show();
                } else {
                    $('#add-item-form').hide();
                    $('.2nd-form').hide();
                }
            });
</script>

<script>
    var j = 0;
            $('.add-more-item').click(function() {
                ++i;
                $('.add-next-item').append(
                    "<div class='row mt-2 next-item-bar'><div class='col-md-3'><input class='form-control'></div><div class='col-md-3'><input type='number' class='form-control'></div><div class='col-md-3'><input class='form-control' placeholder='Additional Cooking Time'></div><div class='col-md-3'><div class='btn btn-danger delete-next-item'>Remove</div></div></div>"
                )
            });
            $(document).on('click', '.delete-next-item', function() {
                $(this).closest('.next-item-bar').remove();
            });
</script>

{{-- <script>
    $(function() {
        myDropzone.destroy();
        Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#myDropzone", {
        url: "{{ route('menu_store') }}",
        paramName: "file",
        addRemoveLinks: true,
        dictRemoveFile: "Remove",
        maxFilesize: 2,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init: function() {
            this.on("success", function(file, response) {
                console.log(response);
            }),
            this.on("error", function(file, response) {
                console.log(response);
            });
        }
    });
});
</script> --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
    FilePond.registerPlugin(
        // encodes the file as base64 data
        FilePondPluginFileEncode,

        // validates the size of the file
        FilePondPluginFileValidateSize,

        // corrects mobile image orientation
        FilePondPluginImageExifOrientation,

        FilePondPluginFilePoster,

        // previews dropped images
        FilePondPluginImagePreview
    );

    // Select the file input and use create() to turn it into a pond
    FilePond.create(document.querySelector("input"));
});
</script>
@endpush
@endsection