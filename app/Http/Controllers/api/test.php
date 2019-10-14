<?php 

    public function request_screenname($fastcode,$firstname,$middle_inital,$lastname,$grade){
        ini_set('memory_limit','85M');
        if (preg_match('/\_/', $firstname)) {
            $firstname = preg_replace('/\_+/', ' ', $firstname);
        } else {
            $firstname = $firstname;
        }
        if (preg_match('/\_/', $middle_inital)) {
            $middle_inital = preg_replace('/\_+/', ' ', $middle_inital);
        } else {
            $middle_inital = $middle_inital;
        }

        if (preg_match('/\_/', $lastname)) {
            $lastname = preg_replace('/\_+/', ' ', $lastname);
        } else {
            $lastname = $lastname;
        }
//copied

        if(!empty($fastcode)){
            $school = School::where('username', $fastcode)->with(['country','state_details'])->first();

        }
        if(!empty($school) && isset($fastcode) && isset($firstname) && isset($middle_inital)&& isset($lastname) && isset($grade)){

            $nounsarray = array();
            $adjectivearr = array();
            $animalarr = array();
            $plantarr = array();
            $namearr = array();

            $words = Word::all();
            $blockwords = Block_word::select('id','words')->get()->toArray();
            $mascot = $school['School']['mascot'];

            foreach ($words as $word) {
                if(!in_array($word['word'], $blockwords)){
                if($word['type'] == 'noun'){
                    $nounsarray[] = $word['word'];
                }
                if($word['type'] == 'adjective'){
                    $adjectivearr[] = $word['word'];
                }
                if($word['type'] == 'animal'){
                    $animalarr[] = $word['word'];
                }
                if($word['type'] == 'plant'){
                    $plantarr[] = $word['word'];
                }
                if($word['type'] == 'name'){
                    $namearr[] = $word['word'];
                }
            }
            }
            $r1 = array_rand($nounsarray);
            $r2 = array_rand($adjectivearr);
            $r3 = array_rand($animalarr);
            $r4 = array_rand($plantarr);
            $r5 = array_rand($namearr);


            $st = Student::where('firstname', $firstname)->where('is_approved',1)->get();

            
            $randnoun = $nounsarray[$r1];

            $randadjective = $adjectivearr[$r2];
            $randanimal = $animalarr[$r3];
            $randplant = $plantarr[$r4];
             $screennamearray = array();


            if(!empty($st)){
                    $acronym = strtoupper($firstname . $middle_inital . $lastname);
                    // $acronym = strtoupper($firstname[0] . $middle_inital[0] .$lastname[0]);

                do { if (!isset($st[0]->firstname) || $st[0]->firstname == '') {
                    $screennamearray[0] = $this->createAvalueForScreenName($firstname);
                } else {
                    $screennamearray[0] = $this->createAvalueForScreenName($firstname);
                }
                    $check = Student::where('screen_name', $screennamearray[0])->count();

                } while ($check > 0);
                
                    do {
                        $screennamearray[1] = $acronym . ' ' . rand(1, 999);
                        $check = Student::where('screen_name', $screennamearray[1])->count();
                    } while ($check > 0);
                    do {
                        $screennamearray[2] = $adjectivearr[array_rand($adjectivearr)] . ' ' . rand(1, 999);
                        $check = Student::where('screen_name', $screennamearray[2])->count();
                    } while ($check > 0);
                    do {
                        $screennamearray[3] = $randanimal . ' ' . rand(100, 999);
                        $check = Student::where('screen_name', $screennamearray[3])->count();
                    } while ($check > 0);
                    do {
                        $screennamearray[4] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randanimal;
                        $check = Student::where('screen_name', $screennamearray[4])->count();
                    } while ($check > 0);
                    // do {
                    //     $screennamearray[5] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randplant;
                    //     $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[5])));
                    // } while ($check > 0);
                    
                
        if(isset($mascot)){
            do {
            $screennamearray[5] = $mascot . ' ' . rand(99,999);
            $check = Student::where('screen_name', $screennamearray[5])->count();
            } while ($check > 0);  
        }else{
            do {
                 $screennamearray[5] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randplant;
                $check = Student::where('screen_name', $screennamearray[5])->count();
            } while ($check > 0);   
        }
        
                    
                    
                    
                    do {
                        $screennamearray[6] = $adjectivearr[array_rand($adjectivearr)] . ' ' . rand(1, 999);
                        $check = Student::where('screen_name', $screennamearray[6])->count();
                    } while ($check > 0);
         }else{


            dd("adkjdasgasdgh");
//              do {
//                    if ($st['Student']['firstname'] == '') {
//                        $screennamearray[0] = $nounsarray[array_rand($nounsarray)] . ' ' . rand(1, 999);
//                    } else {
//                        $screennamearray[0] = $st['Student']['firstname'] . ' ' . rand(1, 999);
//                    }
//                    $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[0])));
//                } while ($check > 0);
//
//                $acronym = strtoupper($firstname . $middle_inital . $lastname);
//                do {
//                    $screennamearray[1] = $acronym . ' ' . rand(1, 999);
//                    $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[1])));
//                } while ($check > 0);
//
//
//                 do {
//                    $screennamearray[2] = $adjectivearr[array_rand($adjectivearr)] . ' ' . rand(1, 999);
//                    $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[2])));
//                } while ($check > 0);
//
//
//                do {
//                    $screennamearray[3] = $randanimal . ' ' . rand(100, 999);
//                    $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[3])));
//                } while ($check > 0);
//                do {
//                    $screennamearray[4] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randanimal;
//                    $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[4])));
//                } while ($check > 0);
//                do {
//                    $screennamearray[5] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randplant;
//                    $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[5])));
//                } while ($check > 0);
//                do {
//                    $screennamearray[6] = $adjectivearr[array_rand($adjectivearr)] . ' ' . rand(1, 999);
//                    $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[6])));
//                } while ($check > 0);
        
             do { if (!isset($st['Student']['firstname']) || $st['Student']['firstname'] == '') {
                     $screennamearray[0] = $this->createAvalueForScreenName($firstname);
                 } else {
                     $screennamearray[0] = $this->createAvalueForScreenName($firstname);
                 }
                 $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[0])));
             } while ($check > 0);
             
             $acronym = strtoupper($firstname[0] . $middle_inital[0] .$lastname[0]);
             do {
                 $screennamearray[1] = $this->createAvalueForScreenName($acronym);
                 $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[1])));
             } while ($check > 0);
             
             do {
                 $screennamearray[2] = $this->createAvalueForScreenName($school['School']['country_id']);
                 $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[2])));
             } while ($check > 0);
             
             do {
                 $screennamearray[3] =$this->createAvalueForScreenName( $school['School']['city'] );
                 $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[3])));
             } while ($check > 0);
             do {
                 $screennamearray[4] = $this->createAvalueForScreenName($state['UsaState']['name'] );
                 $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[4])));
             } while ($check > 0);
            //  do {
            //      $screennamearray[5] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randplant;
            //      $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[5])));
            //  } while ($check > 0);
             
     if(isset($mascot) && $mascot != null){
            do {
            $screennamearray[5] = $mascot . ' ' . rand(99,999);
            $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[5])));
            } while ($check > 0);  
        }else{
            do {
                 $screennamearray[5] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randplant;
                $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[5])));
            } while ($check > 0);   
        }
             
             
             
             
             do {
                 $screennamearray[6] = $this->createAvalueForScreenName($adjectivearr[array_rand($adjectivearr)]);
                 $check = $this->Student->find('count', array('conditions' => array('Student.screen_name' => $screennamearray[6])));
             } while ($check > 0);
             
//             $re = $this->UsaState->find('first', array('conditions' => array('state_abbr' => $student['city'])));
//             foreach ($re as $vvvv) {
//                 $this->set('result', $vvvv);
//             }
             
     
             
         }

     }
     //$firstname . $middle_inital . $lastname
        if(!empty($screennamearray) && isset($fastcode) && isset($firstname) && isset($middle_inital) && isset($lastname) && isset($grade)){
            $data['Status']='Success';
            $data['Student']=array(
                'firstname'=>isset($firstname)?$firstname:"",
                'middlename'=>isset($middle_inital)?$middle_inital:"",
                'lastname'=>isset($lastname)?$lastname:"",
                'grade'=>isset($grade)?$grade:"",
                'fastcode'=>isset($fastcode)?$fastcode:""
            );
            $data['School']=array(
                'school_name'=>isset($school['School']['school_name'])?$school['School']['school_name']:"",
                'username'=>isset($school['School']['username'])?$school['School']['username']:"",
                'school_code'=>isset($school['School']['school_code'])?$school['School']['school_code']:"",
                'school_email'=>isset($school['School']['school_email'])?$school['School']['school_email']:"",
                'address'=>isset($school['School']['address'])?$school['School']['address']:"",
                'phone'=>isset($school['School']['phone'])?$school['School']['phone']:"",
                'country_id'=>isset($school['School']['country_id'])?$school['School']['country_id']:"",
                'country_name'=>isset($country['Country']['name'])?$country['Country']['name']:"",
                'city'=>isset($school['School']['city'])?$school['School']['city']:"",
                'state'=>isset($school['School']['state'])?$school['School']['state']:"",
                'state_name'=>isset($state['UsaState']['name'])?$state['UsaState']['name']:"",
                'state_abbr'=>isset($state['UsaState']['state_abbr'])?$state['UsaState']['state_abbr']:"",
                'fastcode'=>isset($school['School']['fastcode'])?$school['School']['fastcode']:""
            );
            $data['screenname']=$screennamearray;
        }else{
            $data['Status']='Invalid';
            $data['Student']="";
            $data['screenname']="";
            $data['School']="";
        }

        $check = json_encode($data);

        $this->set('check', $check);
        $this->set(array(
            'check' => $check,
            '_serialize' => array('check')
        ));
        }

        
    }

?>