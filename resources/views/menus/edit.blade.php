@extends('layouts.app')

@section('content')
@push('styles')
<style>
    .previewMenuImg {
        width: 20%;
        height: 20%;
    }

    .menu-wrapper {
        position: relative;
        height: 150px;
        width: 150px;
        margin: 50px 5px;
        border-radius: 5%;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 1px 1px 15px -5px gray;
        transition: all 0.3s ease;
        border-style: dashed;
        border-color: gray;
    }

    .menu-wrapper:hover {
        transform: scale(1.05);
        cursor: pointer;
    }

    .menu-wrapper:hover .previewMenuImg {
        opacity: 0.5;
    }

    .menu-wrapper .previewMenuImg {
        height: 150px;
        width: 150px;
        transition: all 0.3s ease;
    }

    .menu-wrapper .previewMenuImg:after {
        font-family: FontAwesome;
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        font-size: 190px;
        background: #ecf0f1;
        color: #34495e;
        text-align: center;
    }

    .menu-wrapper .upload-button {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    .menu-wrapper .upload-button .fa-plus {
        position: absolute;
        font-size: 50px;
        /* top: -17px; /
  / left: 0; */
        text-align: center;
        opacity: 100%;
        transition: all 0.3s ease;
        color: #34495e;
        margin: auto;
        height: 150px;
        line-height: 150px;
        width: 100%;
        background: #dbd6d6;
    }

    .menu-wrapper .fa-remove {
        color: #34495e;
    }

    .menu-wrapper .delete-file {
        cursor: pointer;
        position: absolute;
        right: 0;
        top: 0;
    }
</style>
@endpush
<h1>Edit</h1>
<form enctype="multipart/form-data" method="POST">
    @csrf
    <div class="container-fluid p-3">
        @foreach ($menu->photos as $photo)
        <img src="{{asset('/storage/'. $photo)}}" alt="photo" style="width:200px;height:200px" class="img-thumbnail">
        @endforeach
        <div class="row">
            @foreach ($menu->photos as $photo)
            @if ($photo)
            <div style="display: flex;">
                <div>
                    <dl id="delete_file1" class="menu-wrapper">
                        <div class="element">
                            <img id="output1" class="previewMenuImg" src="{{asset('/storage/'. $photo)}}" />
                            <a href="javascript:void" class="delete-file" onclick="deletefileLink(1)" id="delete_file1"
                                hidden><i class="fa fa-remove" aria-hidden="true"></i></a>
                        </div>
                    </dl>
                </div>
                <div id="moreFileUpload" style="display: flex;
                flex-wrap: wrap;
                margin: 0 5px;"></div>
            </div>
            @endif
            @endforeach
            <div style="display: flex;">
                <div>
                    <dl id="delete_file1" class="menu-wrapper">
                        <div class="element">
                            <img id="output1" class="previewMenuImg" src="" />
                            <div class="upload-button" id="upload_button1" onclick="upload(1)">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </div>
                            <input type="file" class="file-upload" name="photos[1]" id="upload_file1" readonly="true"
                                onchange="addfile(1,event)" />
                            <a href="javascript:void" class="delete-file" onclick="deletefileLink(1)" id="delete_file1"
                                hidden><i class="fa fa-remove" aria-hidden="true"></i></a>
                        </div>
                    </dl>
                </div>
                <div id="moreFileUpload" style="display: flex;
                flex-wrap: wrap;
                margin: 0 5px;"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <input type="text" name="english_name" value="{{ $menu->english_name}}" placeholder="Item Name EN"
                    class="form-control">
            </div>
            <div class="col-6">
                <input type="text" name="myanmar_name" value="{{$menu->myanmar_name}}" placeholder="Item Name MM"
                    class="form-control">
            </div>
            <div class="col-12 mt-2">
                <textarea placeholder="Short Description" name="description"
                    class="form-control">{{ $menu->description}}</textarea>
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
                    <option value="1">Simple</option>
                    <option value="varient1">Varient</option>
                </select>
            </div>
            <div class="col-6 mt-2">
                <input type="number" name="basic_price" value="{{ $menu->basic_price }}" placeholder="Basic Price"
                    class="form-control">
            </div>
            <div class="col-6 mt-2">
                <input type="number" name="cook_time" value="{{ $menu->cook_time }}" placeholder="Cook Time"
                    class="form-control">
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
                            id="customSwitches" {{$menu->status === 1 ? "checked" : ""}}>
                        <label class="custom-control-label" for="customSwitches">Active</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary text-dark" style="width: 300px">Update
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

<script>
    $(document).ready(function () {
    $("input[id^='upload_file']").each(function () {
        var id = parseInt(this.id.replace("upload_file", ""));
        $("#upload_file" + id).change(function () {
            if ($("#upload_file" + id).val() !== "") {
                $("#moreFileUploadLink").show();
            }
        });
    });
});

function addfile(eleId,event) {

    var upload_number = eleId + 1;
    //add more file
    var moreUploadTag = '';
    moreUploadTag += '<div class="element">';
    moreUploadTag += '<img id="output' + upload_number +'" class="previewMenuImg" src=""/><div class="upload-button" id="upload_button' + upload_number +'"  onclick="upload(' + upload_number + ')"><i class="fa fa-plus" aria-hidden="true"></i></div>';
    moreUploadTag += '<input type="file" class="file-upload" id="upload_file' + upload_number + '" name="photos[' + upload_number + ']" onchange="addfile(' + upload_number + ',' + 'event)"/>';
    moreUploadTag += '<a href="javascript:void" class="delete-file" onclick="deletefileLink(' + upload_number + ')" id="delete_file' + upload_number + '" hidden><i class="fa fa-remove" aria-hidden="true"></i></a>';
    $('<dl id="delete_file' + upload_number + '" class="menu-wrapper"' + upload_number + '">' + moreUploadTag + '</dl>').fadeIn('slow').appendTo('#moreFileUpload');
    upload_number++;

    $('#upload_file'+eleId).attr("hidden","hidden");

    $('#upload_button'+eleId).attr('hidden', 'hidden');
   
    $('a#delete_file'+eleId).removeAttr('hidden');

    var output = document.getElementById('output'+eleId);

    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
}

function deletefileLink(eleId) {
    if (confirm("Are you really want to delete ?")) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }
}

function upload(eleId) {
    $("#upload_file" + eleId).click();
}
</script>
@endpush
@endsection