<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ramaiah Institute of Technology-Online Test Screen Record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://www.webrtc-experiment.com/RecordRTC.js"></script>
  <script src="https://www.webrtc-experiment.com/gif-recorder.js"></script>
  <script src="https://www.webrtc-experiment.com/getScreenId.js"></script>
  <script src="https://www.webrtc-experiment.com/DetectRTC.js"> </script>
  <!-- for Edige/FF/Chrome/Opera/etc. getUserMedia support -->
  <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
  <script>
      if (DetectRTC.browser.isChrome){
          if (DetectRTC.isMobileDevice) {
              alert('Please Use Desktop Version of Chrome');
              window.location.replace("http://msrit.edu/");
          }
          //alert(DetectRTC.osName);
          //alert(DetectRTC.osVersion);
      } else {
          alert('Browser Not Supported. Please Use Dektop Version of Chrome');
          window.location.replace("http://msrit.edu/");
      }
      navigator.getMedia = ( navigator.getUserMedia || // use the proper vendor prefix
                       navigator.webkitGetUserMedia ||
                       navigator.mozGetUserMedia ||
                       navigator.msGetUserMedia);

        navigator.getMedia({video: true}, function() {
            console.log('Webcam Available');
            console.clear();
        }, function() {
          alert('Webcam Not Available., Please Check if Camera Persmission Provided or Not');
          document.getElementById('main').style.display = 'none';
        });
        
        navigator.getMedia({audio: true}, function() {
            console.log('audio Available');
            console.clear();
        }, function() {
          alert('MicroPhone Not Available., Please Check if MicroPhone Persmission Provided or Not');
          document.getElementById('main').style.display = 'none';
        });
        
  </script>
  <style>
    video {
        width: 30%;
        border-radius: 5px;
        border: 1px solid black;
    }
    #wel-header-top {
        background: url(http://msrit.edu/img/ramaiah-header-astric.jpg);
        background-color: #201e3e;
        position: relative;
        padding: 15px 0 5px 0;
        /* height: 50px; */
        background-position: 100%;
        background-repeat: no-repeat;
        box-shadow: inset 0 5px 22px 0px rgba(0,0,0,0.7);
    }
    #wel-page-footer {
        background-color: #191d3d;
        color: #d4d4d9;
        padding: 20px 0 20px;
        position: relative;
    }
</style>
</head>
<body>

<div id="wel-page-header">
	<div id="wel-header-top">
		<div class="container" style="max-height: 86px;">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div id="logo-image" class="pull-left">
						<a href="../index.html">
							<img src="http://d2e9h3gjmozu47.cloudfront.net/brand.png" style="max-height: 78px;" alt=""> </a>
					</div>
				</div>
			</div>
		</div>
		<!-- row -->

	</div>
	<!-- container -->
</div>
<div class="container">
<?php
if ((!empty($_GET['name'])) and (!empty($_GET['usn']))) {
    echo '
    <div id="main">
        <center><h1>Screen Recorder During Online Test</h1></center>
        <br>
        <center><button class="btn btn-primary" id="btn-start-recording">Start Recording</button></center>
        <br>
        <div class="container">
            <center><video controls autoplay playsinline style="width: 60%;"></video></center>
        </div>
        <center><p id="size"></p><p id="download_id"></p></center>
    </div>
    ';
} else {
    echo '
    <form method="get">
      <div class="form-group">
        <b><label for="name">Student Name:</label></b>
        <input type="text" name="name" class="form-control" id="name">
      </div>
      <div class="form-group">
        <b><label for="usn">Student USN:</label></b>
        <input type="text" name="usn" class="form-control" id="usn">
      </div>
      <button type="submit" class="btn btn-danger">Submit</button>
    </form>
    ';
}
?>
</div>    
    
    

<br>

<footer id="wel-page-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <p id="copyright" class="text-left">2020 © <strong>Ramaiah Institute of Technology</strong>, All Rights Reserved.</p>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <p id="copyright" class="text-right"></p>
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
    <p id="back-top" style="display: block;"><a href="#top"> <i class="fa fa-arrow-up"></i></a></p>
</footer>

<script>
    if(!navigator.getDisplayMedia && !navigator.mediaDevices.getDisplayMedia) {
        var error = 'Your browser does NOT supports getDisplayMedia API.';
        document.querySelector('h1').innerHTML = error;
    
        document.querySelector('video').style.display = 'none';
        document.getElementById('btn-start-recording').style.display = 'none';
        document.getElementById('btn-stop-recording').style.display = 'none';
        console.log(error);
        throw new Error(error);
    }
    
    function invokeGetDisplayMedia(success, error) {
        var displaymediastreamconstraints = {
            video: {
                displaySurface: 'monitor', // monitor, window, application, browser
                logicalSurface: true,
                cursor: 'always' // never, always, motion
            }
        };
    
        // above constraints are NOT supported YET
        // that's why overridnig them
        displaymediastreamconstraints = {
            video: true
        };
    
        if(navigator.mediaDevices.getDisplayMedia) {
            navigator.mediaDevices.getDisplayMedia(displaymediastreamconstraints).then(success).catch(error);
            console.log('getDisplayMedia');
        }
        else {
            navigator.getDisplayMedia(displaymediastreamconstraints).then(success).catch(error);
            console.log('getDisplayMedia Error');
        }
    }
    
    function captureScreen(callback) {
        console.log('Called captureScreen function');
        invokeGetDisplayMedia(function(screen) {
            addStreamStopListener(screen, function() {
                if(window.stopCallback) {
                    window.stopCallback();
                }
    
            });
            callback(screen);
        }, function(error) {
            console.error(error);
            alert('Unable to capture your screen. Please check console logs.\n' + error);
        });
    }
    
    function captureCamera(cb) {
        console.log('Loading Camera Module');
        navigator.mediaDevices.getUserMedia({audio: true, video: true}).then(cb);
    }
    
    function keepStreamActive(stream) {
        console.log('keepStreamActive');
        var video = document.createElement('video');
        video.muted = true;
        video.srcObject = stream;
        video.style.display = 'none';
        (document.body || document.documentElement).appendChild(video);
    }
    
    document.getElementById('btn-start-recording').onclick = function() {
        captureScreen(function(screen) {
            keepStreamActive(screen);
            captureCamera(function(camera) {
                keepStreamActive(camera);
        
                screen.width = window.screen.width;
                screen.height = window.screen.height;
                screen.fullcanvas = true;
                
                camera.width = 320;
                camera.height = 240;
                camera.top = screen.height - camera.height;
                camera.left = screen.width - camera.width;
                
                var recorder = RecordRTC([screen, camera], {
                    type: 'video',
                    mimeType: 'video/webm',
                    previewStream: function(s) {
                        document.querySelector('video').muted = true;
                        document.querySelector('video').srcObject = s;
                    }
                });
        
                recorder.startRecording();
                document.getElementById('btn-start-recording').style.display = 'none';
        
                window.stopCallback = function() {
                    window.stopCallback = null;
        
                    recorder.stopRecording(function() {
                        console.log('Stopping Recoding')
                        var blob = recorder.getBlob();
                        document.querySelector('video').srcObject = null;
                        document.querySelector('video').src = URL.createObjectURL(blob);
                        console.log(URL.createObjectURL(blob))
                        document.querySelector('video').muted = false;
        
                        [screen, camera].forEach(function(stream) {
                            stream.getTracks().forEach(function(track) {
                                track.stop();
                            });
                        });
                        
                        window.open(URL.createObjectURL(blob));
                        console.log('Video Downloded');
                        
                        // generating a random file name
                        var fileName = <?php
                                        if ((!empty($_GET['name'])) and (!empty($_GET['usn']))) {
                                            echo '"'.$_GET['name'].'_'.$_GET['usn'].'_'.rand().'.webm"';
                                            //echo '".$_GET['name'].'_'.$_GET['usn'].'webm;'';
                                        } else {
                                            echo "temp.webm";
                                        }
                                        ?>
			    
                        console.log(fileName);
                        
                        // we need to upload "File" --- not "Blob"
                        var fileObject = new File([blob], fileName, {
                            type: 'video/webm'
                        });
                        
                        var formData = new FormData();

                        // recorded data
                        formData.append('video-blob', fileObject);

                        // file name
                        formData.append('video-filename', fileObject.name);
                        
                        document.getElementById('size').innerHTML = 'File size: (' +  bytesToSize(fileObject.size) + ') Please Wait File Uploading to Cloud Server';
                        alert("Please Don't Close the Browser");
                        
                        var upload_url = 'save.php';
                        var upload_directory = '/uploads/';
                        
                        // upload using jQuery
                        $.ajax({
                            url: upload_url, // replace with your own server URL
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST',
                            success: function(response) {
                                if (response === 'success') {
                                    alert('successfully uploaded recorded blob');

                                    // file path on server
                                    var fileDownloadURL = upload_directory + fileObject.name;
                                    console.log(fileDownloadURL);
                                    tempurl = 'https://gec-chamarajanagara.ac.in/AshrafAliS/test/'+fileDownloadURL;

                                    // preview the uploaded file URL
                                    document.getElementById('download_id').innerHTML = '<a href="' + tempurl + '" target="_blank">' + fileObject.name + '</a>';

                                    // open uploaded file in a new tab
                                    console.log(tempurl);
                                    window.open(tempurl);
                                } else {
                                    alert(response); // error/failure
                                }
                            }
                        });
                    });
                };
            });
        });
    }
    
    function addStreamStopListener(stream, callback) {
        console.log('addStreamStopListener');
        stream.addEventListener('ended', function() {
            callback();
            callback = function() {};
        }, false);
        stream.addEventListener('inactive', function() {
            callback();
            callback = function() {};
        }, false);
        stream.getTracks().forEach(function(track) {
            track.addEventListener('ended', function() {
                callback();
                callback = function() {};
            }, false);
            track.addEventListener('inactive', function() {
                callback();
                callback = function() {};
            }, false);
        });
    }
    
    
</script>

<script src="https://www.webrtc-experiment.com/common.js"></script>

</body>
</html>
