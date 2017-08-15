<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Subject extends AppModel {
  public $validate = array(
        'name' =>  array(
          'positive0'=> array(
                  'rule' => array('lengthBetween', 5, 20),
                        'require ' => true,
                         'message' => 'The subject must be between 5 and 20 caracter'
       ),
       array(
               'rule' => '/^[a-zA-Z]{5,}$/i',
                     'require ' => true,
                      'message' => 'Only letters are allowed'
    )

  ));
}
