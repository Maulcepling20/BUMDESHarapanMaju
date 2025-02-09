</div>

<div id="Contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>Alamat</h3>
                    <p>Jl. Raya Kalegen, Wonosobo, Kalegen, Kec. Bandongan, Kabupaten Magelang, Jawa Tengah, ID 56151</p>
                </div>
                <div class="footer-section">
                    <h3>Email</h3>
                    <p>kalegendesa152@gmail.com</p>
                </div>
                <div class="footer-section">
                    <h3>Contact Person</h3>
                    <p>087739778736</p>
                    <p>(Faizal Rahman)</p>
                </div>
                <div class="footer-section">
                    <h3>Social Media</h3>
                    <p><b>YouTube: </b>Desa Kalegen</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2024. <b>BUMDES Kalegen</b> All Rights Reserved.
        </div>
    </div>
    <script>
    $(document).ready(function() {
    $('#summernote').summernote({
        callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                }
            },
        height: 200,
        toolbar: [
			["style", ["bold", "italic", "underline", "clear"]],
			["fontname", ["fontname"]],
			["fontsize", ["fontsize"]],
			["color", ["color"]],
			["para", ["ul", "ol", "paragraph"]],
			["height", ["height"]],
			["insert", ["link", "picture", "imageList", "video", "hr"]],
			["help", ["help"]]
		],
		dialogsInBody: true,
		imageList: {
			endpoint: "daftar_gambar.php",
			fullUrlPrefix: "../gambar/",
			thumbUrlPrefix: "../gambar/"
		}
     }); 

     $.upload = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);

            $.ajax({
                method: 'POST',
                url: 'upload_gambar.php',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('#summernote').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
    });
    </script>
</body>
</html>
