<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Student extends AppModel {

  public $validate = array(
          'firstname' =>  array(
              'positive0'=> array(
                    'rule' => array('lengthBetween', 5, 20),
                    'require ' => true,
                    'message' => 'The firstname must be between 5 and 20 caracter'
       ),
                    array(
                      'rule' => '/^[a-zA-Z]{5,}$/i',
                      'require ' => true,
                      'message' => 'Only letters are allowed'
                      )

        ),
        'lastname' => array(
          'positive0'=> array(
                  'rule' => array('lengthBetween', 5, 20),
                  'require ' => true,
                  'message' => 'The firstname must be between 5 and 20 caracter'
                  ),
                    array(
                    'rule' => '/^[a-zA-Z]{5,}$/i',
                    'require ' => true,
                    'message' => 'Only letters are allowed'
    )

    ),
       'birthday' => array(
         'age0'=> array(
            'rule' => 'date',
            'message' => 'Enter a valid birthday date',
            'require ' => true,

            'allowEmpty' => false,
        ),
        'age1'=> array(
           'rule' => 'isAgeInAcceptedRange',
           'message' => 'Enter a valid birthday date',
      )

  ));

  function isAgeInAcceptedRange($check) {

        list($Y,$m,$d) = explode("-", $check['birthday']);

        $userAge = ( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );

        if ( ($userAge >= 8) && ($userAge <= 70) ):
                return true;
        else:
                return false;
        endif;

}

}
