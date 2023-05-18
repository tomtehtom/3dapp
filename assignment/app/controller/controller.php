<?php
// Create the controller class for the MVC design pattern
class Controller {

	// Declare public variables for the controller class
	public $load;
	public $model;
	
	// Create functions for the controller class
	function __construct($pageURI = null) // contructor of the class
	{
		// Create new objects for Load and Model
		$this->load = new Load(); 
		$this->model = new Model();
		// Determine what page you are on
		$this->$pageURI();
	}
    // home page function
	function home()
	{
		// Get data from the defined model method - model3D_info()
		//$data = $this->model->model3D_info();
		$data = $this->model->dbGetData();
		// Tell the loader what view to load and which dat to use
		$this->load->view('view3DAppMain', $data);
	}


    function view3DAppTest()
	{
		// Get data from the defined model method - model3D_info()
		$data = $this->model->model3D_info();
		
		// Tell the loader what view to load and which dat to use
		$this->load->view('view3DAppTest', $data);
	}


    function apiCreateTable()
	{
	  	// echo "Create table function";
		$data = $this->model->dbCreateTable();
		$this->load->view('viewMessage', $data);
	}
	function apiInsertData()
	{
		$data = $this->model->dbInsertData();
	   	$this->load->view('viewMessage', $data);
	}  
	function apiGetData()
	{
		$data = $this->model->dbGetData();
		$this->load->view('view3DAppData', $data);
	}  



//part c
// New methods for Part C of Lab 7 Tutorial, which use AJAX
	// Flickr API
	function apiGetFlickrFeed()
	{
        $this->load->view('viewFlickrFeed');
	}

	// API call to read JSON data from a JSON file
	function apiGetJson()
	{
		$this->load->view('viewJson');
	}

	// API call to select 3D images
	function apiLoadImage()
	{
	   // Get the brand data from the (this) Model using the dbGetBrand() meyhod in this Model class	
	   ChromePhp::warn('controller.php: [apiLoadImage] Get the Brand data');	
	   $data = $this->model->dbGetBrand();
	   // Note, the viewDrinks.php view being loaded here calls a new model
	   // called modelDrinkDetails.php, which is not part of the Model class
	   // It is a separate model illustrating that you can have many models
	   ChromePhp::log($data);  
	   $this->load->view('viewDrinks', $data);
	}


    //old part b



	
	function dbCreateTable()
	{
		echo "Create Table Function";
	}

	function dbInsertData()
	{
		echo "Data Insert Function";
	}

	function dbGetData()
	{
		echo "Data Read Function";
	}

}
?>    