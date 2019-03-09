window.onload = function() {
		  // Video
		  var video = document.getElementById("video");

		  // Buttons
		  var crossButton = document.getElementById("cross");
		  var playButton = document.getElementById("play-pause");
		  var muteButton = document.getElementById("mute");
		  var searchForm = document.getElementById("searchform");
		  var colorOverlay = document.getElementById("color-overlay");
		  var videoControls = document.getElementById('video-controls');
		  var uvodnikButton = document.getElementById('uvodnik');
		  var videoContainer = document.getElementById('video-container');
		  
		  var infoForm = document.getElementById('info_form');
		  var alertButton = document.getElementById('alert_button');
		  var closeButton = document.getElementById('close_button');

		  var successMessage = document.getElementById('success');
		  var errorMessage = document.getElementById('error');


			var videoWrapper = document.getElementsByClassName("fluid-width-video-wrapper")[0];
			if(videoWrapper != null)
				videoWrapper.style.paddingTop = "0";
	
	if(successMessage != null)
	setTimeout(function(){
  		successMessage.fadeOut(); 
 	}, 3000);
	
	if(errorMessage != null)
	setTimeout(function(){
  		errorMessage.fadeOut(); 
 	}, 3000);
		
		if(alertButton != null){
			alertButton.addEventListener("click",function() {
				if(infoForm.style.opacity === "" || infoForm.style.opacity === "0"){
					infoForm.style.opacity = "1";
					infoForm.style.top = 0;
				}
			})
		}

		if(closeButton != null)
			closeButton.addEventListener("click",function() {
				if(infoForm.style.opacity === "1"){
					infoForm.style.opacity = "0";
					infoForm.style.top = "-9999px";
				}
			})
		
		// Event listener for the uvodni video button
		if(uvodnikButton != null)
			uvodnikButton.addEventListener("click", function() {
				if(videoContainer.style.opacity === ""){
					videoContainer.style.opacity = "1";
					videoContainer.style.top = 0;
					document.getElementById('header').style.zIndex = "0";
				}else if(videoContainer.style.opacity === "0"){
					videoContainer.style.opacity = "1";
					videoContainer.style.top = "0";
					document.getElementById('header').style.zIndex = "0";
				}else{
					videoContainer.style.opacity = "0";
					videoContainer.style.top = "-9999px";
					document.getElementById('header').style.zIndex = "1";
				}
			});

		// Event listener for the search button
		if(crossButton != null)
			crossButton.addEventListener("click", function() {
					video.pause();
					playButton.style.backgroundImage = "url('http://musicforyou.cekuj.net/wp-content/uploads/2018/09/play.png')";
					videoContainer.style.opacity = "0";
					videoContainer.style.top = "-50em";
					document.getElementById('header').style.zIndex = "1";

			});
			
			// Event listener for the play/pause button
		if(playButton != null)	
			playButton.addEventListener("click", function() {
			  if (video.paused == true) {
			    // Play the video
			    video.play();

			    // Update the button text to 'Pause'
			    playButton.style.backgroundImage = "url('http://musicforyou.cekuj.net/wp-content/uploads/2018/09/pauza.png')";
			    colorOverlay.style.backgroundColor = "rgba(255,255,255,0)";
			    //searchForm.className = "hidden";
				crossButton.style.opacity = "0";
		    	playButton.style.opacity = "0";
		    	muteButton.style.opacity = "0";	
			    

				video.addEventListener("ended", endedFunction);
			    
			    document.getElementById('video-controls').addEventListener("mouseover", myFunction);
			    document.getElementById('video-controls').addEventListener("mouseout", otherFunction);

			    function myFunction(){
			    	colorOverlay.style.backgroundColor = "rgba(255,255,255,.6)";
			    	crossButton.style.opacity = "1";
			    	playButton.style.opacity = "1";
			    	muteButton.style.opacity = "1";	
			    };

			    function otherFunction(){
			    	colorOverlay.style.backgroundColor = "transparent";
			    	crossButton.style.opacity = "0";
			    	playButton.style.opacity = "0";
			    	muteButton.style.opacity = "0";	
			    };

			    function endedFunction(){
			    	playButton.style.backgroundImage = "url('http://musicforyou.cekuj.net/wp-content/uploads/2018/09/play.png')";
			    	colorOverlay.style.backgroundColor = "rgba(255,255,255,.6)";
			    	crossButton.style.opacity = "1";
			    	playButton.style.opacity = "1";
			    	muteButton.style.opacity = "1";	
			    };

			  } else {
			    // Pause the video
			    video.pause();

			    // Update the button text to 'Play'
			    playButton.style.backgroundImage = "url('http://musicforyou.cekuj.net/wp-content/uploads/2018/09/play.png')";
			    colorOverlay.style.backgroundColor = "rgba(255,255,255,.6)";
	/*
			    //Odebrani tridy
			    function odebratTridu(element, trida) {
				  element.className = element.className.replace(trida, "");
				}

				odebratTridu(searchForm, "hidden");
	*/
				document.getElementById('video-controls').addEventListener("mouseover", myFunction);
			    document.getElementById('video-controls').addEventListener("mouseout", myFunction);

				function myFunction(){
					colorOverlay.style.backgroundColor = "rgba(255,255,255,.6)";
					crossButton.style.opacity = "1";
			    	playButton.style.opacity = "1";
			    	muteButton.style.opacity = "1";	
			    };

			  }
			});


		// Event listener for the mute button
		if(muteButton != null)
			muteButton.addEventListener("click", function() {
			  if (video.muted == false) {
			    // Mute the video
			    video.muted = true;

			    // Update the button text
			    muteButton.style.backgroundImage = "url('http://musicforyou.cekuj.net/wp-content/uploads/2018/09/unmute.png')";
			  } else {
			    // Unmute the video
			    video.muted = false;

			    // Update the button text
			    muteButton.style.backgroundImage = "url('http://musicforyou.cekuj.net/wp-content/uploads/2018/09/turnoff.png')";
			  }
			});
}