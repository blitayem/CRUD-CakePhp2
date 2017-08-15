<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Note extends AppModel {
  public $belongsTo=array('Student'=>
                        array('className' => 'Student',
                              'foreignKey'=>'student',
                            )
                            ,
                            'Subject'=> array('className' => 'Subject',
                                                        'foreignKey'=>'subject',

                           ));
                           public $validate = array(
                               'note' =>  array(
                                 'positive0'=> array(
                                   'rule' => array('comparison', '>=', 0),
                                   'require ' => true,
                                   'allowEmpty ' => false,
                                   'message' => 'The note must be between 0 and 20.'
                               ),
                               'positive1'=> array(
                                 'rule' => array('comparison', '<=', 20),
                                 'require ' => true,
                                 'allowEmpty ' => false,
                                 'message' => 'The note must be between 0 and 20.'
                             ),
                             'numeric'=> array(
                               'rule' => 'numeric',
                              'message' => 'The note must be numeric.'
                           )

                           ),'subject' =>  array(
                             'rule' => 'numeric',
                               'require ' => true,
                              ),'student' =>  array(
                                'rule' => 'numeric',
                                'require ' => true,
                                ),

                           );
}
