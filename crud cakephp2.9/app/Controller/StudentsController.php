<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
*/
class  StudentsController  extends AppController {

  public function index() {
    //to retrieve all students, need just one line
    $this->set('students', $this->Student->find('all'));
}

public function edit() {
    //get the id of the student to be edited
    $id = $this->request->params['pass'][0];

    //set the student id
    $this->Student->id = $id;

    //check if a student with this id really exists
    if( $this->Student->exists() ){

        if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
            //save student
            if( $this->Student->save( $this->request->data ) ){

                //set to student's screen
                $this->Flash->set('student was edited.');

                //redirect to student's list
                $this->redirect(array('action' => 'index'));

            }else{
                $this->Flash->set('Unable to edit student. Please, try again.');
            }

        }else{

            //we will read the student data
            //so it will fill up our html form automatically
            $this->request->data = $this->Student->read();
        }

    }else{
        //if not found, we will tell the student that student does not exist
        $this->Flash->set('The student you are trying to edit does not exist.');
        $this->redirect(array('action' => 'index'));

        //or, since it we are using php5, we can throw an exception
        //it looks like this
        //throw new NotFoundException('The student you are trying to edit does not exist.');
    }


}

public function delete() {
    $id = $this->request->params['pass'][0];


    //the request must be a post request
    //that's why we use postLink method on our view for deleting student
    if( $this->request->is('get') ){

        $this->Flash->set('Delete method is not allowed.');
        $this->redirect(array('action' => 'index'));

        //since we are using php5, we can also throw an exception like:
        //throw new MethodNotAllowedException();
    }else{

        if( !$id ) {
            $this->Flash->set('Invalid id for student');
            $this->redirect(array('action'=>'index'));

        }else{
            //delete student
            if( $this->Student->delete( $id ) ){
                //set to screen
                $this->Flash->set('student was deleted.');
                //redirect to students's list
                $this->redirect(array('action'=>'index'));

            }else{
                //if unable to delete
                $this->Flash->set('Unable to delete student.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
}

  public function add(){

      //check if it is a post request
      //this way, we won't have to do if(!empty($this->request->data))
      if ($this->request->is('post')){
          //save new student
          if ($this->Student->save($this->request->data)){

              //set flash to student screen
              $this->Flash->set('student was added.');
              //redirect to student list
              $this->redirect(array('action' => 'index'));

          }else{
              //if save failed
              $this->Flash->set('Unable to add student. Please, try again.');

          }
      }
  }


  /*
   * Displays a view
   *
   * @return void
   * @throws NotFoundException When the view file could not be found
   *	or MissingViewException in debug mode.
   */
  	public function display() {
  		$path = func_get_args();

  		$count = count($path);
  		if (!$count) {
  			return $this->redirect('/');
  		}
  		$page = $subpage = $title_for_layout = null;

  		if (!empty($path[0])) {
  			$page = $path[0];
  		}
  		if (!empty($path[1])) {
  			$subpage = $path[1];
  		}
  		if (!empty($path[$count - 1])) {
  			$title_for_layout = Inflector::humanize($path[$count - 1]);
  		}
  		$this->set(compact('page', 'subpage', 'title_for_layout'));

  		try {
  			$this->render(implode('/', $path));
  		} catch (MissingViewException $e) {
  			if (Configure::read('debug')) {
  				throw $e;
  			}
  			throw new NotFoundException();
  		}
  	}
}
