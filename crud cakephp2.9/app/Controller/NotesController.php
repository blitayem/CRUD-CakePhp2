<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
*/
class  NotesController  extends AppController {

  public function index() {
    //to retrieve all notes, need just one line
    $this->set('notes', $this->Note->find('all'));

}

public function edit() {
    //get the id of the note to be edited
    $id = $this->request->params['pass'][0];

    //set the note id
    $this->Note->id = $id;

    //check if a note with this id really exists
    if( $this->Note->exists() ){

        if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
            //save note
            if( $this->Note->save( $this->request->data ) ){

                //set to note's screen
                $this->Flash->set('Note was edited.');

                //redirect to note's list
                $this->redirect(array('action' => 'index'));

            }else{
                $this->Flash->set('Unable to edit note. Please, try again.');
            }

        }else{

            //we will read the note data
            //so it will fill up our html form automatically
            $this->request->data = $this->Note->read();
        }

    }else{
        //if not found, we will tell the note that note does not exist
        $this->Flash->set('The note you are trying to edit does not exist.');
        $this->redirect(array('action' => 'index'));

        //or, since it we are using php5, we can throw an exception
        //it looks like this
        //throw new NotFoundException('The note you are trying to edit does not exist.');
    }


}

public function delete() {
    $id = $this->request->params['pass'][0];

    //the request must be a post request
    //that's why we use postLink method on our view for deleting note
    if( $this->request->is('get') ){

        $this->Flash->set('Delete method is not allowed.');
        $this->redirect(array('action' => 'index'));

        //since we are using php5, we can also throw an exception like:
        //throw new MethodNotAllowedException();
    }else{

        if( !$id ) {
            $this->Flash->set('Invalid id for note');
            $this->redirect(array('action'=>'index'));

        }else{
            //delete note
            if( $this->Note->delete( $id ,true) ){
                //set to screen
                $this->Flash->set('note was deleted.');
                //redirect to note's list
                $this->redirect(array('action'=>'index'));

            }else{
                //if unable to delete
                $this->Flash->set('Unable to delete note.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
}

  public function add(){
      $this->loadModel('Subject');
      $this->loadModel('Student');
      $options = $this->Subject->find('list', ['keyField' => 'id', 'valueField' => 'name']);
      $options2 = $this->Student->find('list',array('fields'=>array('id','firstname')));

      $this->set(compact('options','options2'));
      //check if it is a post request
      //this way, we won't have to do if(!empty($this->request->data))
      if ($this->request->is('post')){
          //save new note
          if ($this->Note->save($this->request->data)){

              //set flash to note screen
              $this->Flash->set('note was added.');
              //redirect to note list
              $this->redirect(array('action' => 'index'));

          }else{
              //if save failed
              $this->Flash->set('Unable to add note. Please, try again.');

          }
      }
  }
}
