//adapted from example code 'benskitchen.com'

cardList = ["coke", "sprite", "pepper", "glass"]
modelTag = "3d-model"
currentModel = "coke";
spinKeys = ["0 1 0 0 0 1 0 1.57079 0 1 0 3.14159  0 1 0 4.71239  0 1 0 6.28317", "0 1 0 6.28317 0 1 0 4.71239 0 1 0 3.14159 0 1 0 1.57079 0 1 0 0", "1 0 0 0 1 0 0 1.57079 1 0 0 3.14159  1 0 0 4.71239  1 0 0 6.28317", "0 0 1 0 0 0 1 1.57079 0 0 1 3.14159  0 0 1 4.71239  0 0 1 6.28317"]

lightOn = true;
spinning = false;
WireOn = false;
backOn = true;

const x3dFiles = [
    "assets/models/CanV1.x3d",
    "assets/models/SpriteV3.x3d",
    "assets/models/PepperV5.x3d",
    "assets/models/GlassCokeV13.x3d"
  ];

const directoryDictionary = {};

directoryDictionary[x3dFiles[0].toString()] = 'coke';
directoryDictionary[x3dFiles[1].toString()] = 'sprite';
directoryDictionary[x3dFiles[2].toString()] = 'pepper';
directoryDictionary[x3dFiles[3].toString()] = 'glass';

const nameToDirectory = {};
for (const directory in directoryDictionary) {
  const name = directoryDictionary[directory];
  nameToDirectory[name] = directory;
}

function setContent(name) {



    cardList.forEach(function (element) {
        document.getElementById(element.toString() + '-card').style.display = 'none';
    });

    document.getElementById(name.toString() + '-card').style.display = 'block';
    //modelTag = name.toString() + '-model';
       //modelTag = name;

       currentModel = name;
    console.log("Page Content set to: " + name);

    set3dScene(nameToDirectory[name]);
    
    
    //document.getElementById(modelTag.toString()+'__RotationTimer').setAttribute('enabled', spinning.toString());

}


  var canvasIndex = 0;


  var x3dContainer = document.getElementById("model-scene");
  var x3dSceneRuntime;
  var inlineNode;




  function loadNewX3DFile(filename) {
    x3dSceneRuntime = document.getElementById('model-scene');
    
    unloadCurrentX3DFile();

    setTimeout(function() {
        inlineNode = document.createElement("inline");
        inlineNode.setAttribute("id", "3dCanvas");
        inlineNode.setAttribute("nameSpaceName", "3d-model");
        inlineNode.setAttribute("url", "" + filename.toString());
        inlineNode.setAttribute("mapDEFToID", "true");
        x3dSceneRuntime.appendChild(inlineNode);

        console.log("File changed to: " + filename.toString());

        
          }, 300);


        setTimeout(function() {
        

            $('#3d-model').fadeTo(300, 1);;
            }, 1300);

    
  }


  function loadInitialX3DFile() {

    console.log("loading runtimex3d");
    x3dSceneRuntime = document.getElementById('model-scene');


    inlineNode = document.createElement("inline");
    inlineNode.setAttribute("id", "3dCanvas");
    inlineNode.setAttribute("nameSpaceName", "3d-model");
    inlineNode.setAttribute("url", "assets/models/CanV1.x3d");
    inlineNode.setAttribute("mapDEFToID", "true");
    x3dSceneRuntime.appendChild(inlineNode);

    
  }

  function unloadCurrentX3DFile() {

    $('#3d-model').fadeTo(300, 0);;

    setTimeout(function() {

    
    if (inlineNode) {

        const cameras = document.getElementsByTagName("Viewpoint");
            console.log("Found " + cameras.length + " cameras to unbind.");
        
        // Iterate through each camera and unbind it to avoid render errors/crashing x3dom
        for (let i = 0; i < cameras.length; i++) {
          cameras[i].setAttribute("bind", "false");
        }

      x3dSceneRuntime.removeChild(inlineNode);

    }

    }, 300);

  }

  




//loadNewX3DFile();

function set3dScene(directory){

    lightOn = true;
    spinning = false;
    WireOn = false;
    wireFrameReset();
    backOn = true;

    loadNewX3DFile(directory);


// // Had big issues switching scene url as all cameras have to be unbound before switching x3d scenes to avoid render errors crashing X3D.
// const inlineNode = document.getElementById("3dCanvas");
//    inlineNode.removeAttribute("url");
   
//   // inlineNode.setAttribute("url", "models/SpriteV3.x3d");
  
//     const cameras = document.getElementsByTagName("Viewpoint");
//     console.log("Found " + cameras.length + " cameras to unbind.");

// // Iterate through each camera and unbind it
// for (let i = 0; i < cameras.length; i++) {
//   cameras[i].setAttribute("bind", "false");
// }

//     console.log("DIrectory: " + directory);
//   $("#3dCanvas").attr("url", directory.toString());
//   //  $("#3d-model").attr("bindViewpoint", "true");
//   console.log("reloading...");
//   inlineNode.setAttribute("bind", 'true');
  
  


//   const x3dDiv = document.getElementById('model-scene'); // Assuming '3d-model' is the ID of the <x3d> element

//   // Traverse through all child nodes of the x3dDiv
//   const childNodes = x3dDiv.childNodes;
//   console.log("child nodes" + childNodes.length);
//   for (let i = 0; i < childNodes.length; i++) {
//     const childNode = childNodes[i];
//   console.log("child: " + childNode);
//     // Check if the child node is an element node
//     if (childNode.nodeType === Node.ELEMENT_NODE) {
//       // Set the 'bind' attribute to 'true'
//       childNode.setAttribute('bind', 'true');
//     }
//   }

//   var x3dElement = document.getElementById('3dCanvas');
//   var url = x3dElement.getAttribute('url');
  
//   // Set the URL attribute to trigger reloading
//   x3dElement.setAttribute('url', '');
  
//   // Delay the re-assignment to allow the browser to clear the previous scene
//   setTimeout(function() {
//     x3dElement.setAttribute('url', url);
//   }, 2500);
  



}

function setTexture(textureNum){
   

    // document.getElementById(modelTag.toString() + '-id').setAttribute("url", dir.toString());

   // document.getElementById(modelTag.toString() + '__TEX_001').setAttribute("url", dir.toString());


    document.getElementById(modelTag.toString() + '__TEX_001').setAttribute("url", 
    "texture/" + currentModel.toString() + "/" + currentModel.toString() + "_texture_" + textureNum + ".png");

    // document.getElementById('cantext').setAttribute('url', dir.toString());

//    document.getElementById(modelTag.toString() + "__" + "MA_Material_001").setAttribute('transparency', amount.toString());
     console.log(currentModel.toString() + " texture changed to " + textureNum + "texture/" + currentModel.toString() + "/" + currentModel.toString() + "_texture_" + textureNum + ".png");

}





function spin() {
    spinning = !spinning;
    const element = document.getElementById(modelTag.toString() + '__RotationTimer');
    if (element) {
        console.log("found: " + element.toString());
    }
    else {
        console.log("failed to find");
    }
    document.getElementById(modelTag.toString() + '__RotationTimer').setAttribute('enabled', spinning.toString());
    console.log(spinning.toString());
    
}

function stopRotation() {
    spinning = false;
    document.getElementById('model__RotationTimer').setAttribute('enabled', spinning.toString());
}

function animateModel() {
    if (document.getElementById('model__RotationTimer').getAttribute('enabled') != 'true')
        document.getElementById('model__RotationTimer').setAttribute('enabled', 'true');
    else
        document.getElementById('model__RotationTimer').setAttribute('enabled', 'false');
}

function setSpin(num) {
    if (!spinning) {
        spin()
    }
    document.getElementById(modelTag.toString() + '__Rotator').setAttribute('keyValue', spinKeys[num]);
    console.log("Set keys to: " + spinKeys[num]);

}

function wireFrame() {
    WireOn = !WireOn;
    var e = document.getElementById(modelTag);
    e.runtime.togglePoints(true);
    e.runtime.togglePoints(true);
}

function wireFrameReset() {
    var e = document.getElementById(modelTag);
    e.runtime.togglePoints(false);
    e.runtime.togglePoints(false);
}

function headLight() {
    lightOn = !lightOn;
    document.getElementById(modelTag.toString() + "__" + "headlight").setAttribute('headlight', lightOn.toString());
    console.log(lightOn);

}

function backColour() {
console.log("test :" + modelTag.toString());
    document.getElementById(modelTag.toString() + "__" + "WO_World").setAttribute('skyColor', "0.5 0.51 0.551");
    console.log("back changed");


}

function setBackTrans(amount) { 

    document.getElementById(modelTag.toString() + "__" + "WO_World").setAttribute('transparency', amount.toString());

}



function setBackImg(num) { 

    document.getElementById(modelTag.toString() + "__" + "WO_World").setAttribute('backUrl', "../../texture/back/back_" + num.toString() + ".png");

}

function setTrans(amount) {

  
    

    // const element = document.getElementById(modelTag.toString() + "__" + "MA_Material_001");

    // if (element !== null) {
    //     // Element found, do something with it
    //     console.log("Element found:", element);
    //   } else {
    //     // Element not found
    //     console.log("Element not found");
    //   }

    document.getElementById(modelTag.toString() + "__" + "MA_Material_001").setAttribute('transparency', amount.toString());
   
   // x3dom.reload();
   //console.log("trans changed to " + amount.toString());
   

}

function handleColorChange(color) {
    console.log("Updating color " + color.toString());
    // Convert color value from hex to RGB
    const r = parseInt(color.substring(1, 3), 16) / 255;
    const g = parseInt(color.substring(3, 5), 16) / 255;
    const b = parseInt(color.substring(5, 7), 16) / 255


    document.getElementById(modelTag.toString() + "__" + "MA_Material_001").setAttribute('diffuseColor', r.toString() + " " + g.toString() + " " + b.toString());
    console.log("Updated color to: " + r.toString() + g.toString() + b.toString());
    // Call the SetColor function with RGB values
    //SetColor(r, g, b);
}

function handleColorChangeBackSky(color) {
    console.log("Updating color " + color.toString());
    // Convert color value from hex to RGB
    const r = parseInt(color.substring(1, 3), 16) / 255;
    const g = parseInt(color.substring(3, 5), 16) / 255;
    const b = parseInt(color.substring(5, 7), 16) / 255


    document.getElementById(modelTag.toString() + "__" + "WO_World").setAttribute('skyColor', r.toString() + " " + g.toString() + " " + b.toString());
    console.log("Updated color to: " + r.toString() + g.toString() + b.toString());
    // Call the SetColor function with RGB values
    //SetColor(r, g, b);
}

function handleColorChangeBackGround(color) {
    console.log("Updating color " + color.toString());
    // Convert color value from hex to RGB
    const r = parseInt(color.substring(1, 3), 16) / 255;
    const g = parseInt(color.substring(3, 5), 16) / 255;
    const b = parseInt(color.substring(5, 7), 16) / 255


    document.getElementById(modelTag.toString() + "__" + "WO_World").setAttribute('groundColor', r.toString() + " " + g.toString() + " " + b.toString());
    console.log("Updated color to: " + r.toString() + g.toString() + b.toString());
    // Call the SetColor function with RGB values
    //SetColor(r, g, b);
}


function omniLight() {
    lightOn = !lightOn;
    document.getElementById('model__omniLight').setAttribute('headlight', lightOn.toString());
    console.log(lightOn);
}

function targetLight() {
    lightOn = !lightOn;
    document.getElementById('model__targetLight').setAttribute('headlight', lightOn.toString());
    console.log(lightOn);
}


function switchCamera(camId) {
    console.log("Current cam: " + modelTag.toString() + " " + camId.toString());
    document.getElementById(modelTag.toString() + "__" + camId.toString()).setAttribute('bind', 'true');
}


function downloadClick(){
    var x3dContent = getUpdatedX3DContent(); //retrieve the X3D scene content
    var filename = 'scene.x3d';
    downloadX3DScene(x3dContent, filename);
}

function getUpdatedX3DContent() {

    var x3dScene = document.getElementById('model-scene');
    
    var clonedScene = x3dScene.cloneNode(true);
  
//string convert
    var serializer = new XMLSerializer();
    var x3dString = serializer.serializeToString(clonedScene);
  
    return x3dString;
  }

function downloadX3DScene(x3dContent, filename) {
    var blob = new Blob([x3dContent], { type: 'application/x-x3d+xml' });
  
    var link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = filename;
    link.target = '_blank'; 
    link.click();
  }
  
 

  