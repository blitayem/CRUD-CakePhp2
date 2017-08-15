<?php
App::uses('AppController', 'Controller');
/**
 * Subjects Controller
*/
class  SubjectsController  extends AppController {

  public function index() {
    //to retrieve all subjects, need just one line
    $this->set('subjects', $this->Subject->find('all'));
}

public function edit() {
    //get the id of the subject to be edited
    $id = $this->request->params['pass'][0];

    //set the subject id
    $this->Subject->id = $id;

    //check if a subject with this id really exists
    if( $this->Subject->exists() ){

        if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
            //save subject
            if( $this->Subject->save( $this->request->data ) ){

                //set to subject's screen
                $this->Flash->set('subject was edited.');

                //redirect to subject's list
                $this->redirect(array('action' => 'index'));

            }else{
                $this->Flash->set('Unable to edit subject. Please, try again.');
            }

        }else{

            //we will read the subject data
            //so it will fill up our html form automatically
            $this->request->data = $this->Subject->read();
        }

    }else{
        //if not found, we will tell the subject that subject does not exist
        $this->Flash->set('The subject you are trying to edit does not exist.');
        $this->redirect(array('action' => 'index'));

        //or, since it we are using php5, we can throw an exception
        //it looks like this
        //throw new NotFoundException('The subject you are trying to edit does not exist.');
    }


}

public function delete() {
    $id = $this->request->params['pass'][0];

    //the request must be a post request
    //that's why we use postLink method on our view for deleting subject
    if( $this->request->is('get') ){

        $this->Flash->set('Delete method is not allowed.');
        $this->redirect(array('action' => 'index'));

        //since we are using php5, we can also throw an exception like:
        //throw new MethodNotAllowedException();
    }else{

        if( !$id ) {
            $this->Flash->set('Invalid id for subject');
            $this->redirect(array('action'=>'index'));

        }else{
            //delete subject
            if( $this->Subject->delete( $id ) ){
                //set to screen
                $this->Flash->set('subject was deleted.');
                //redirect to subjects's list
                $this->redirect(array('action'=>'index'));

            }else{
                //if unable to delete
                $this->Flash->set('Unable to delete subject.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
}

  public function add(){

      //check if it is a post request
      //this way, we won't have to do if(!empty($this->request->data))
      if ($this->request->is('post')){
          //save new subject
          if ($this->Subject->save($this->request->data)){

              //set flash to subject screen
              $this->Flash->set('subject was added.');
              //redirect to subject list
              $this->redirect(array('action' => 'index'));

          }else{
              //if save failed
              $this->Flash->set('Unable to add subject. Please, try again.');

          }
      }
  }
}
