<?php

class ProjectTest extends CDbTestCase {

    public $fixtures = array(
        'projects' => 'Project',
         'users' => 'User',
       'projUsrAssign' => ':tbl_project_user_assignment',
    ); 
    public function testCREATE() {
        //test Create
        $newProject = new Project;
        $newProjectName = 'Test Project Creation';
        $newProject->setattributes(
                array(
                    'name' => $newProjectName,
                    'description' => 'the first project',
                    'createtime' => "2013-02-03 00:00:00",
                    'create_user_id' => 1,
                    'update_time' => '2014-01-01 00:00:00',
                    'update_user_id' => 1,
                )
        );
        $this->assertTrue($newProject->save(false));
        $retrievedProject = Project::model()->findByPK($newProject->id);
        $this->assertTrue($retrievedProject instanceof Project);
        $this ->assertEquals($retrievedProject->name, $newProjectName);
    }
    public function testRead(){
         $retrievedProject = $this->projects('project1');
         $this->assertTrue($retrievedProject instanceof Project);
         $this->assertEquals('Test Project 1', $retrievedProject->name);
    }
     
      
    public function testUpdate(){ 
        $project = $this->projects('project2');
        $updateProjectName = 'Updated Test Project 2';
        $project->name = $updateProjectName;
        $this->assertTrue($project->save(false));
        
        //test Delete
        $updateProject  = Project::model()->findByPK($project->id);
        $this->assertTrue($updateProject instanceof Project);
        $this->assertEquals($updateProjectName, $updateProject->name);   
    }
    public function testDelete(){
        //test Delete
        $project = $this->projects('project2'); 
        $ProjectId = $project->id;
        $this->assertTrue($project->delete());
        $deleteProject = Project::model()->findByPK($ProjectId);
        $this->assertTrue(NULL, $deleteProject);
    }
    
    public function  testGetUserOptions(){
        $project = $this->projects('project1');
        $options = $project->getUserOptions;
        $this->assertTrue(is_array($options));
        $this->assertTrue(count($options)>0);
    }
}
?>