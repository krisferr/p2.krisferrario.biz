<?php
class practice_controller extends base_controller {
    
    
    
    public function test_db() {
        /*
        # INSERT PRACTICE
        $q = "INSERT INTO users
            SET first_name = 'Albert',
            last_name = 'Einstein'";
            
        echo $q;
        */
        /*
        $q = "UPDATE users
            SET email = 'albert@aol.com'
            WHERE first_name = 'Albert'";
        
        DB::instance(DB_NAME)->query($q);
        */
        
        /*
        $new_user = Array(
            'first_name' => 'Albert',
            'last_name' => 'Einstein',
            'email' => 'albert@gmail.com',
        );
        
        DB::instance(DB_NAME) -> insert ('users', $new_user);
        */
        
        $_POST['first_name'] = 'Albert';
        
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);
        
        $q = 'SELECT email
            FROM users
            WHERE first_name = "'.$_POST['first_name'].'"';
        
        echo DB::instance(DB_NAME) -> select_field($q);
            
        
    }
    /*
    public function test1() {
        
        require(APP_PATH.'/libraries/image.php');
        
        /*
        Instantiate an Image object using the "new" keyword
        Whatever params we use when instantiating are passed to __construct 
        */
        #$imageObj = new Image('http://placekitten.com/500/500');
        
        /*
        Call the resize method on this object using the object operator (single arrow ->) 
        which is used to access methods and properties of an object
        */
        #$imageObj->resize(200,200);
        
        # Display the resized image
        #$imageObj->display();
    #}
    
    /*
    public function test2(){
        #Static
        echo Time::now();
        
    }
    */
}
    
?>


