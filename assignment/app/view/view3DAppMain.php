<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- <link rel="stylesheet" href="css/info-style.css"> -->

    <!-- Include the x3dom JavaScript -->
    <!-- <script type='text/javascript' src='js/x3dom.js'></script> -->
    <script src="https://x3dom.org/download/1.8.2/x3dom.js"></script>


    <!-- <script type='application/javascript' src="js/popper.js"></script> -->

    <script type='text/javascript' src='js/3d-functions.js'> </script>
    <script type="text/javascript" src="js/gallery_generator.js"></script>

    <script type='text/javascript' src="js/getJsonData.js"></script>


    <script type='text/javascript' src="js/page-control.js"></script>

    <script type='module' src="js/info-poppers.js"></script>

    <script src="js/startupScript.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/cookies.js"></script>


    <title>3D App Museum</title>

</head>

<body onload="onStartup(), loadInitialX3DFile()">

    <!-- Logo and navigation bar -->

    <nav class="navbar navbar-expand-sm  navbar-dark bg-dark ">
        <div class="container">

            <div class="logo" style="padding-right: 10px;">
                <a class="navbar-brand" href="#">

                    <h1>D</h1>
                    <h1>rinks</h1>
                    <h2>R</h2>
                    <h3>Us</h3>
                    <p>Refreshing the world, one drink at a time</p>
                </a>
            </div>
            <!-- <img src="your-logo.png" alt="Logo" width="50" height="50"> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" data-bs-toggle="tooltip" title="Page switching utilises JQuery to update content locally without reloading the page or directing to another page. Uses page-control.js.">
                <ul class="navbar-nav w-100 text-center">
                    <li class="nav-item flex-fill">
                        <a id="el1" class="nav-link " href="#">Coke</a>
                    </li>
                    <li class="nav-item flex-fill">
                        <a id="el2" class="nav-link" href="#" data-bs-placement="bottom" data-bs-toggle="tooltip" title="The lower card for Sprite uses data.Json model instead of the database to show implementation as an example.">Sprite</a>
                    </li>
                    <li class="nav-item flex-fill">
                        <a id="el3" class="nav-link" href="#">Pepper</a>
                    </li>
                    <li class="nav-item flex-fill">
                        <a id="el4" class="nav-link" href="#">Glass</a>
                    </li>

                    <li class="nav-item flex-fill">
                        <a id="el5" class="nav-link" href="#" onclick="themeToggle()" data-bs-toggle="tooltip" title="Theme Toggle: Stores Cookies to save which theme you have set, loads this setting when revisiting the page/refreshing. Uses theme.js & global css variables.">Toggle Theme</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container main_contents">
        <div class="row"> <!-- Carousel -->
            <div class="col-sm-12">


                <div id="carouselContainer" data-bs-toggle="tooltip" title="This carousel uses PHP to create a hook and uses Javascript to issue a XMLHttpRequest to the hook and retrieve the list of files in the directory. You can also click on the images to pop them out in a bootstrap modal.">

                </div>


            </div>
        </div>


        <div class="container ">


            <!-- Row of cards on the grid -->
            <div class="row custom-row">
                <!-- Coca Cola Column -->
                <div class="col" id="">
                    <div class="card w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="The X3D Scene window. Note the scene dynamically reloads and replaces the existing scene when switching models. This is because you cannot switch the URL of an X3D scene on runtime without it crashing. 3d-functions.js unbinds all cameras, unloads the scene and reloads the next scene when switching. Optimised to ensure no more than 1 scene is ever loaded onto the client. All covered with timings and fade animations for smooth experience.">


                        <div id="3d-card" class="card-body">
                            <h3 class="card-title">3D Model Viewer</h3>

                            <x3d width='100%' height='100%' id="3d-model">
                                <scene id="model-scene">
                                    <!-- <inline id="3dCanvas" nameSpaceName="3d-model" mapDEFToID="true" url="models/CanV1.x3d"> -->
                                    <!-- </inline>  -->
                                </scene>
                            </x3d>


                            <p class="card-text"></p>

                        </div>
                    </div>
                </div>

                <div class="col" id="3d-editor" data-bs-toggle="tooltip" title="3D Object Editor: This panel utilises custom 3d-Functions.js to manipulate all models using the exact same buttons for optimised loading of the page. Fully setup Cameras, lighting, movement animations. All models have 4 switchable textures. Models with non-textured materials can be colour & transparency changed. Background can be changed and image applied. You can also download a fully working clone of the current scene on screen as an .x3d file. I have loaded these back in to test and they load correctly.">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">3D Object Editor</h5>

                            <!-- Camera Controls -->
                            <div class="mb-4">
                                <h6>Camera Controls</h6>
                                <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraFront')">Front</button>
                                <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraBack')">Back</button>
                                <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraLeft')">Left</button>
                                <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraRight')">Right</button>
                                <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraTop')">Top</button>
                                <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraBottom')">Bottom</button>

                            </div>

                            <!-- Animation -->
                            <div class="mb-4">
                                <h6>Animation</h6>
                                <button type="button" class="btn btn-primary mr-2" onclick="spin('3d-model')">Play/Pause</button>
                                <button type="button" class="btn btn-primary mr-2" onclick="setSpin(0)">Spin Y</button>
                                <button type="button" class="btn btn-primary mr-2" onclick="setSpin(1)">Spin Y Opp</button>
                                <button type="button" class="btn btn-primary mr-2" onclick="setSpin(2)">Spin X</button>
                                <button type="button" class="btn btn-primary mr-2" onclick="setSpin(3)">Spin Z</button>

                            </div>

                            <!-- Lighting Section -->
                            <div class="mb-4">
                                <h6>Lighting</h6>

                                <button type="button" class="btn btn-secondary mr-2" onclick="headLight()">Toggle Light</button>

                            </div>

                            <!-- Materials Section -->
                            <div class="mb-4">
                                <h6>Materials</h6>

                                <div>
                                    <button type="button" class="btn btn-secondary mr-2" onclick="setTexture(0)">Texture 1</button>
                                    <button type="button" class="btn btn-secondary mr-2" onclick="setTexture(1)">Texture 2</button>
                                    <button type="button" class="btn btn-secondary mr-2" onclick="setTexture(2)">Texture 3</button>
                                    <button type="button" class="btn btn-secondary mr-2" onclick="setTexture(3)">Texture 4</button>
                                    <button type="button" class="btn btn-primary" onclick="wireFrame()">Wireframe Toggle</button>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">


                                        <label for="slider">Material Opacity Slider:</label>
                                        <input type="range" class="form-control mb-2" min="0" max="1" value="0.5" step="0.01" id="myRange" oninput="setTrans(1-this.value)" />

                                    </div>

                                    <div class="col-md-6">

                                        <label for="colorPicker">Material Color Picker:</label>
                                        <input type="color" style="height: 30px;" id="colorPicker" class="form-control mb-2" oninput="handleColorChange(this.value)" onchange="handleColorChange(this.value)" />

                                    </div>
                                </div>

                            </div>

                            <!-- Environment Section -->
                            <div>
                                <h6>Environment</h6>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="slider">Background Opacity:</label>
                                        <input type="range" class="form-control mb-2" min="0" max="1" value="0.5" step="0.01" id="myRange" oninput="setBackTrans(1-this.value)" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="backgroundColorPicker">Sky Color:</label>
                                        <input type="color" class="form-control mb-2" oninput="handleColorChangeBackSky(this.value)" onchange="handleColorChangeBackSky(this.value)" />
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <input type="color" class="form-control mb-2" id="backgroundColorPicker"> -->
                                        <label for="ambientColorPicker">Ground Color:</label>
                                        <!-- <input type="color" class="form-control" id="ambientColorPicker"> -->
                                        <input type="color" class="form-control mb-2" oninput="handleColorChangeBackGround(this.value)" onchange="handleColorChangeBackGround(this.value)" />
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary mr-2" onclick="setBackImg(0)">Add Background Image</button>

                            </div>

                            <!-- Extra Section -->
                            <div>
                                <h6>Extras</h6>
                                <button id="download-button" type="button" class="btn btn-secondary mr-2" onclick="downloadClick()">Download Scene (Usable X3D File with your Modified Changes)</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>



        <!-- New row -->
        <div class="row">

            <!-- Coke Column -->
            <div id="coke-card" class="card" data-bs-toggle="tooltip" title="This card pulls all data from the SQLLite Database using PHP Data Objects, including the URL for the banner image.">

                <a href="#">
                    <img id="coke-img" class="card-img-top img-fluid img-thumbnail" src="<?php echo $data[0]['modelPhotoURL'] ?>" alt="Coca Cola">
                </a>
                <p>Photo Realistic renders using Blender and realism shaders and materials.</p>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[0]['modelTitle'] ?></h3>
                            <p class="card-text"><?php echo $data[0]['modelDescription'] ?></p>

                        </div>

                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[0]['x3dModelTitle'] ?></h3>
                            <h3 class="card-title">Method</h3>
                            <p class="card-text"><?php echo $data[0]['x3dCreationMethod'] ?></p>
                        </div>

                    </div>



                </div>
            </div>
            <!-- Sprite Column -->
            <div id="sprite-card" class="card" data-bs-toggle="tooltip" title="This card pulls data from a Json file using an AJAX request. Uses getJsonData.js. This was left as an example to prove implementation. Other cards are all pulled from Database.">
                <a href="#">
                    <div id="modelPhotoURL">

                    </div>

                </a>
                <p>Photo Realistic renders using Blender and realism shaders and materials.</p>
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-6">
                            <div id="modelTitle"></div>
                            <div id="modelDescription"></div>

                        </div>

                        <div class="col-md-6">
                            <div id="x3dModelTitle"></div>
                            <h3 class="card-title">Method</h3>
                            <div id="x3dCreationMethod"></div>
                        </div>

                    </div>

                </div>
            </div>


            <!-- Dr Pepper Column -->
            <div id="pepper-card" class="card" data-bs-toggle="tooltip" title="This card pulls all data from the SQLLite Database using PHP Data Objects, including the URL for the banner image.">

                <a href="#">
                    <img id="pepper-img" class="card-img-top img-fluid img-thumbnail" src="<?php echo $data[2]['modelPhotoURL'] ?>" alt="Coca Cola">
                </a>
                <p>Photo Realistic renders using Blender and realism shaders and materials.</p>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[2]['modelTitle'] ?></h3>
                            <p class="card-text"><?php echo $data[2]['modelDescription'] ?></p>

                        </div>

                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[2]['x3dModelTitle'] ?></h3>
                            <h3 class="card-title">Method</h3>
                            <p class="card-text"><?php echo $data[2]['x3dCreationMethod'] ?></p>
                        </div>

                    </div>



                </div>
            </div>


            <!-- Glass column -->

            <div id="glass-card" class="card" data-bs-toggle="tooltip" title="This card pulls all data from the SQLLite Database using PHP Data Objects, including the URL for the banner image.">

                <a href="#">
                    <img id="glass-img" class="card-img-top img-fluid img-thumbnail" src="<?php echo $data[3]['modelPhotoURL'] ?>" alt="Coca Cola">
                </a>
                <p>Photo Realistic renders using Blender and realism shaders and materials.</p>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[3]['modelTitle'] ?></h3>
                            <p class="card-text"><?php echo $data[3]['modelDescription'] ?></p>

                        </div>

                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[3]['x3dModelTitle'] ?></h3>
                            <h3 class="card-title">Method</h3>
                            <p class="card-text"><?php echo $data[3]['x3dCreationMethod'] ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <nav class="navbar navbar-expand-sm footer" data-bs-toggle="tooltip" title="Page resizes for mobile use by stacking cards upright. (Required custom-row css) 3d Scene also rescales from desktop all the way down to mobile without issue. All built using bootstrap latest 5.3">
        <div class="container">
            <div class="navbar-text float-left copyright">
                <p><span class="align-baseline"></span>&copy Web 3D Apps </span></p>
            </div>
            <div class="navbar-text social">
                <a href="#"><i class="fab fa-github-square fa-2x fa-pull-right"></i></a>
                <a href="#"><i class="fab fa-google-plus-square fa-2x fa-pull-right"></i></a>
                <a href="#"><i class="fab fa-twitter-square fa-2x fa-pull-right"></i></a>
                <a href="#"><i class="fab fa-facebook-square fa-2x fa-pull-right"></i></a>
            </div>
        </div>
    </nav>





</body>

</html>