// JavaScript Gallery Generator

$(document).ready(function () {
	// Create the XMLHttpRequest Object for communicating with the web server
	var xmlHttp = new XMLHttpRequest();
	// Stores number of horizontalColumns gallery has, if too large it won't fit in browser window
	var numberOfColumns = 3;
	// Stores newly generated gallery HTML code
	var htmlCode = "";
	// Temporarily stores server response while code is generated
	var response;
	// Set up the path to the PHP function that reads the image directory to find the thumbnail file names
	var send = "hook.php";
	// Open the connection to the web server
	xmlHttp.open("GET", send, true);
	// Tell the server that the client has no outgoing message, i.e. we are sending nothing to the server
	xmlHttp.send(null);
	// Check we get a valid server response
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4) {
			// Response handler code
			//alert(xmlHttp.responseText);
			response = xmlHttp.responseText.split("~");



			var carouselIndicators = '';
			var carouselItems = '';
			var modalCode = '';
			
			for (var i = 0; i < response.length; i++) {
			  carouselIndicators += '<button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="' + i + '"';
			  if (i === 0) {
				carouselIndicators += ' class="active"';
			  }
			  carouselIndicators += '></button>';
			
			  carouselItems += '<div class="carousel-item';
			  if (i === 0) {
				carouselItems += ' active';
			  }
			  carouselItems += '">';
			  carouselItems += '<a href="#" data-bs-toggle="modal" data-bs-target="#modal' + i + '">';
			  carouselItems += '<img src="' + response[i] + '" class="d-block w-100 img-thumbnail" alt="Image">';
			  carouselItems += '</a>';
			  carouselItems += '</div>';
			
			  modalCode += '<div class="modal fade" id="modal' + i + '" tabindex="-1" aria-labelledby="modalLabel' + i + '" aria-hidden="true">';
			  modalCode += '<div class="modal-dialog modal-dialog-centered modal-lg">';
			  modalCode += '<div class="modal-content">';
			  modalCode += '<div class="modal-body">';
			  modalCode += '<img src="' + response[i] + '" class="img-fluid" alt="Image">';
			  modalCode += '</div>';
			  modalCode += '</div>';
			  modalCode += '</div>';
			  modalCode += '</div>';
			}
			
			var htmlCode = '<div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">';
			htmlCode += '<ol class="carousel-indicators">' + carouselIndicators + '</ol>';
			htmlCode += '<div class="carousel-inner">' + carouselItems + '</div>';
			htmlCode += '<a class="carousel-control-prev" href="#imageCarousel" role="button" data-bs-slide="prev">';
			htmlCode += '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
			htmlCode += '<span class="visually-hidden">Previous</span>';
			htmlCode += '</a>';
			htmlCode += '<a class="carousel-control-next" href="#imageCarousel" role="button" data-bs-slide="next">';
			htmlCode += '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
			htmlCode += '<span class="visually-hidden">Next</span>';
			htmlCode += '</a>';
			

			htmlCode+= '<div class="carousel-caption">';
            htmlCode+=            '<h2 class="shadow-text" >Drinks Website Museum & Custom Editor</h2>';
            htmlCode+=            '<h3 class="shadow-text">Created using interactive Web 3D Technologies</h3>';
            htmlCode+=            '<p class="shadow-text">Welcome to our website, where the art of drinks comes to life! Explore our collection of customizable drink models, allowing you to view, edit, and personalize each design to match your style. From classic soda cans to elegant glassware, our gallery showcases exquisite craftsmanship. Unleash your creativity as you adjust colors, patterns, and labels to create a unique drink design. Share your creations and order physical versions to bring your visions to life. Join us on this exciting journey where beverages and imagination intertwine. Cheers to endless possibilities!</p>';
			htmlCode+=			'</div>';
			htmlCode += '</div>';
			

			htmlCode += '</div>';
			// Append the modal code to the document body
			document.body.insertAdjacentHTML('beforeend', modalCode);
			
			// Set the generated HTML code
			document.getElementById('carouselContainer').innerHTML = htmlCode;


		


		}
	}
});

