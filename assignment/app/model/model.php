<?php
class Model {

// Property declaration, in this case we are declaring a variable or handeler that points to the database connection, this will become a PDO object
public $dbhandle;
	
// Method to create database connection using PHP Data Objects (PDO) as the interface to SQLite
public function __construct()
{
    // Set up the database source name (DSN)
    $dsn = 'sqlite:./db/test1.db';
    
    // Then create a connection to a database with the PDO() function
    try {	
        // Change connection string for different databases, currently using SQLite
        $this->dbhandle = new PDO($dsn, 'user', 'password', array(
                                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                                                    PDO::ATTR_EMULATE_PREPARES => false, // turn off emulation mode for "real" prepared statements
                                                    ));
        // $this->dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'Database connection created</br></br>';
    }
    catch (PDOEXception $e) {
        echo "Cannot connect to the database!";
        // Generate an error message if the connection fails
        print new Exception($e->getMessage());
    }
}

public function dbCreateTable()
{
    try {
        $this->dbhandle->exec("CREATE TABLE Model_3D (Id INTEGER PRIMARY KEY, x3dModelTitle TEXT, x3dCreationMethod TEXT, modelTitle TEXT, modelPhotoURL TEXT, modelDescription TEXT)");
        return "Model_3D table is successfully created inside test1.db file";
    }
    catch (PD0EXception $e){
        print new Exception($e->getMessage());
    }
    $this->dbhandle = NULL;
}


	// This is a simple fix to represent, what would in reality be, a table in the database containing the brand names. 
	// The database schema would then contain a foreign key for each drink entry linking back to the brand name
	// This stuture allows us to read the list of brand names to populate a menu in a view
	public function dbGetBrand()
	{
		// Return the car Brand Names
		return array("-", "Coke", "Coke Light","Coke Zero","Sprite", "Dr Pepper", "Fanta");
	}

public function dbInsertData()
{
    try{
        $this->dbhandle->exec(
        "INSERT INTO Model_3D (Id, x3dModelTitle, x3dCreationMethod, modelTitle, modelPhotoURL, modelDescription) 
            VALUES (1, 'X3D Coke Can Model', 'This was created based on the tutorial and has good optimised polygons, smoothing, switchable textures and lighting & Camera settings.', 'Soda Can','assets/images/coke_realistic.png','Discover the epitome of sleek and efficient packaging with our aluminum soda can display. This masterfully engineered can not only preserves the fizzy goodness of your favorite beverages but also champions sustainability with its lightweight construction and recyclability, making it a true icon of modern beverage consumption.'); " .
        "INSERT INTO Model_3D (Id, x3dModelTitle, x3dCreationMethod, modelTitle, modelPhotoURL, modelDescription) 
            VALUES (2, 'X3D Sprite Bottle Model', 'This is Pulled from the data.json to show an example of AJAX', 'string_3','string_4','string_5'); " .
        "INSERT INTO Model_3D (Id, x3dModelTitle, x3dCreationMethod, modelTitle, modelPhotoURL, modelDescription) 
            VALUES (3, 'X3D Dr Pepper Cup Model', 'Using transparency on both the material and texture, allows a printed effect on glass to be achieved. Along with texture switching, and colour changing & opacity changing of the glass.', 'Glass Cup','assets/images/pepper_realistic.png','Behold the timeless elegance of our glass cup exhibit, an exquisite testament to the artistry of glassblowing. Its delicate curves and flawless transparency invite you to savor your favorite beverages in a vessel that embodies both refinement and sustainability.'); " .
            "INSERT INTO Model_3D (Id, x3dModelTitle, x3dCreationMethod, modelTitle, modelPhotoURL, modelDescription) 
            VALUES (4, 'X3D Glass Coke Bottle Model', 'Combining all skills learnt, multiple textures, multiple transparent layers, complex modelling of the well known contoured shape of the glass coke bottle. Switchable textures and changable colours and transparency.', 'Glass Drink Bottle','assets/images/glass_realistic.png','Step into a world of nostalgic charm as you gaze upon our glass soda bottle exhibit. This carefully crafted relic takes you back to a bygone era, where every sip was savored from the smooth curves of a classic glass vessel. Admire its vintage allure while appreciating its eco-friendly nature, as this timeless gem embraces both tradition and sustainability in the realm of beverage packaging.'); " );
        return "X3D model data inserted successfully inside test1.db";
    }
    catch(PD0EXception $e) {
        print new Exception($e->getMessage());
    }
    $this->dbhandle = NULL;
}

public function dbGetData(){
    try{
        // Prepare a statement to get all records from the Model_3D table
        $sql = 'SELECT * FROM Model_3D';
        // Use PDO query() to query the database with the prepared SQL statement
        $stmt = $this->dbhandle->query($sql);
        // Set up an array to return the results to the view
        $result = null;
        // Set up a variable to index each row of the array
        $i=-0;
        // Use PDO fetch() to retrieve the results from the database using a while loop
        // Use a while loop to loop through the rows	
        while ($data = $stmt->fetch()) {
            // Don't worry about this, it's just a simple test to check we can output a value from the database in a while loop
            // echo '</br>' . $data['x3dModelTitle'];
            // Write the database conetnts to the results array for sending back to the view
            $result[$i]['x3dModelTitle'] = $data['x3dModelTitle'];
            $result[$i]['x3dCreationMethod'] = $data['x3dCreationMethod'];
            $result[$i]['modelTitle'] = $data['modelTitle'];
            $result[$i]['modelPhotoURL'] = $data['modelPhotoURL'];
            $result[$i]['modelDescription'] = $data['modelDescription'];
            //increment the row index
            $i++;
        }
    }
    catch (PD0EXception $e) {
        print new Exception($e->getMessage());
    }
    // Close the database connection
    $this->dbhandle = NULL;
    // Send the response back to the view
    return $result;
}



	//Method to simulate the model data
	public function model3D_info()
	{
		// Simulate the model's data
		return array(
			'model_1' => 'Coke Can 3D Image 1',
			'image3D_1' => 'coke-img',

			'model_2' => 'Coke Can 3D Image 2',
			'image3D_2' => 'sprite-img',

			'model_3' => 'Sprite Bottle 3D Image 1',
			'image3D_3' => 'pepper-img',

			'model_4' => 'Sprite Bottle 3D Image 2',
			'image3D_4' => 'sprite_2',

			'model_5' => 'Dr Pepper Cup 3D Image 1',
			'image3D_5' => 'pepper_1',

			'model_6' => 'Dr Pepper Cup 3D Image 2',
			'image3D_6' => 'pepper_2'
		);
	}
}
?>