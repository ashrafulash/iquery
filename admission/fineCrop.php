
<div class="row">

    <div class="col-lg-6 col-md-8">
        <div class="fine_left">
            <!-- output after uploading image -->
            <div class="image_preview">
                <i class="fas fa-file-import"></i>
                <img id="croppedImg">
            </div>

            <!-- upload or browse image -->
            <div class="brows_image">
                <input type="file" id="upphoto" style="display:none;">
                <label for="upphoto">
                    <span class="inputLabel">Upload Picture</span>
                </label>
            </div>

            <!-- preview -->
            <div id="cropWrapper">
                    <img id="inputImage" src="images/face.jpg">
            </div>

        </div>
        
    </div>



    <div class="col-lg-6 col-md-8">
            <!-- Controller -->
            <div class="cropInputs">
                <div class="inputtools">
                    <p>horizontal movement</p>
                    <input type="range" class="cropRange" name="xmove" id="xmove" min="0" value="0">
                </div>
                <div class="inputtools">
                    <p>vertical movement</p>
                    <input type="range" class="cropRange" name="ymove" id="ymove" min="0" value="0">
                </div>
                <button class="cropButtons" id="zplus">
                    <i class="fas fa-plus"></i>
                </button>
                <button class="cropButtons" id="zminus">
                    <i class="fas fa-minus"></i>
                </button>
                <button id="cropSubmit">Submit</button>
                <button id="closeCrop">Close</button>
            </div>
    </div>
</div>


<!--
    Div structure : Manitan a container which has class "cropHolder"
                    Inside this, another div with the ID of "cropWrapper" and inside this use <img> with any id
                    this have to use in this option: (cropInput: 'inputImage')
    CropInputs    : Here you can maintain structure as you want but keep these IDs same
                    1. "xmove" : for horizontal moving
                    2. "ymove" : for vertical moving
                    3. "zplus" : zoom in button
                    4. "zminus": zoom out button
                    5. "cropSubmit" : submitting the crop
                    6. "closeCrop" : closing the cropping screen
-->




    <script>
        $("#upphoto").finecrop({
            viewHeight: 300,
            cropWidth: 250,
            cropHeight: 250,
            cropInput: 'inputImage',
            cropOutput: 'croppedImg',
            zoomValue: 50
        });
    </script>