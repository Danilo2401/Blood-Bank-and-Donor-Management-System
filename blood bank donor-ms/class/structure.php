<?php

require "database.php";

Class UserDonor extends Database{

    public $id_donor;
    public $name_donor;
    public $surname_donor;
    public $blood_group;
    public $email_donor;
    public $phone_donor;

    public function CreateDonor($name_donor,$surname_donor,$blood_group,$email_donor,$phone_donor){

        $this->name_donor = $name_donor;
        $this->surname_donor = $surname_donor;
        $this->blood_group = $blood_group;
        $this->email_donor = $email_donor;
        $this->phone_donor = $phone_donor;

        $this->name_donor = htmlspecialchars(strip_tags($name_donor));
        $this->surname_donor = htmlspecialchars(strip_tags($surname_donor));
        $this->blood_group = htmlspecialchars(strip_tags($blood_group));
        $this->email_donor = htmlspecialchars(strip_tags($email_donor));
        $this->phone_donor = htmlspecialchars(strip_tags($phone_donor));

        $createQuery = "INSERT INTO bdmsystem.donor(name_donor,surname_donor,blood_group,email_donor,phone_donor) VALUES (:name_donor,:surname_donor,:blood_group,:email_donor,:phone_donor)";

        $createDonor = parent::SetConnection()->prepare($createQuery);

        $createDonor->bindParam(":name_donor",$this->name_donor);
        $createDonor->bindParam(":surname_donor",$this->surname_donor);
        $createDonor->bindParam(":blood_group",$this->blood_group);
        $createDonor->bindParam(":email_donor",$this->email_donor);
        $createDonor->bindParam(":phone_donor",$this->phone_donor);

        $json_outside = array();

        if(!isset($this->name_donor) || empty($this->name_donor) || !ctype_upper($this->name_donor[0])) {
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(!isset($this->surname_donor) || empty($this->surname_donor) || !ctype_upper($this->surname_donor[0])){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(!isset($this->blood_group) || empty($this->blood_group)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(!isset($this->email_donor) || empty($this->email_donor) || !filter_var($this->email_donor,FILTER_VALIDATE_EMAIL)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(strlen($this->phone_donor) < 6 || !isset($this->phone_donor) || empty($this->phone_donor)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif($createDonor->execute()) {
            $json_array = array(
                "status" => true,
                "message" => "You have been successfully made donation."
            );
        }

      array_push($json_outside,$json_array);
      return print_r(json_encode($json_outside));

    }

    function Read(){

        $selectQuery = "SELECT * FROM bdmsystem.donor";

        $selectDonor = parent::SetConnection()->prepare($selectQuery);

        $selectDonor->execute();

        $json_outside = array();

        while ($red = $selectDonor->fetch(PDO::FETCH_ASSOC)){
            $json_array = array(
                "id_donor" => $red["id_donor"],
                "name_donor" => $red["name_donor"],
                "surname_donor" => $red["surname_donor"],
                "blood_group" => $red["blood_group"],
                "email_donor" => $red["email_donor"],
                "phone_donor" => $red["phone_donor"]
            );
            array_push($json_outside,$json_array);
        }

        return print_r(json_encode($json_outside));

    }

    function DeleteDonor($id_donor){

        $this->id_donor = $id_donor;

        $deleteQuery = "DELETE FROM bdmsystem.donor WHERE id_donor = :id_donor";

        $deleteDonor = parent::SetConnection()->prepare($deleteQuery);

        $deleteDonor->bindParam(":id_donor",$this->id_donor);

        $json_outside = array();

        if(!isset($this->id_donor) || empty($this->id_donor)){
            $json_array = array(
                "status" => false,
                "message" => "It is come to an error!"
            );
        }elseif($deleteDonor->execute()){
            $json_array = array(
                "status" => true,
                "message" => "You have successfully deleted donor."
            );
        }

        array_push($json_outside,$json_array);
        return print_r(json_encode($json_outside));

    }

    public function UpdateDonor($id_donor,$name_donor,$surname_donor,$blood_group,$email_donor,$phone_donor){

        $this->id_donor = $id_donor;
        $this->name_donor = $name_donor;
        $this->surname_donor = $surname_donor;
        $this->blood_group = $blood_group;
        $this->email_donor = $email_donor;
        $this->phone_donor = $phone_donor;

        $updateQuery = "UPDATE bdmsystem.donor
        SET name_donor = :name_donor , surname_donor = :surname_donor , blood_group = :blood_group , email_donor = :email_donor , phone_donor = :phone_donor
        WHERE id_donor = :id_donor";

        $updateDonor = parent::SetConnection()->prepare($updateQuery);
        
        $updateDonor->bindParam(":id_donor",$this->id_donor);
        $updateDonor->bindParam(":name_donor",$this->name_donor);
        $updateDonor->bindParam(":surname_donor",$this->surname_donor);
        $updateDonor->bindParam(":blood_group",$this->blood_group);
        $updateDonor->bindParam(":email_donor",$this->email_donor);
        $updateDonor->bindParam(":phone_donor",$this->phone_donor);

        $json_outside = array();

        if(!isset($this->name_donor) || empty($this->name_donor) || !ctype_upper($this->name_donor[0])) {
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(!isset($this->surname_donor) || empty($this->surname_donor) || !ctype_upper($this->surname_donor[0])){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(!isset($this->blood_group) || empty($this->blood_group)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(!isset($this->email_donor) || empty($this->email_donor) || !filter_var($this->email_donor,FILTER_VALIDATE_EMAIL)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(strlen($this->phone_donor) < 6 || !isset($this->phone_donor) || empty($this->phone_donor)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif($updateDonor->execute()) {
            $json_array = array(
                "status" => true,
                "message" => "You have successfully updated donation."
            );
        }

      array_push($json_outside,$json_array);
      return print_r(json_encode($json_outside));

    }

}

Class Patient extends Database{

    public $id_patient;
    public $name_patient;
    public $surname_patient;
    public $gender;
    public $blood_group;
    public $body_weight;
    public $email_patient;
    public $phone_patient;

    public function Create($name_patient,$surname_patient,$gender,$blood_group,$body_weight,$email_patient,$phone_patient){

        $this->name_patient = $name_patient;
        $this->surname_patient = $surname_patient;
        $this->gender = $gender;
        $this->blood_group = $blood_group;
        $this->body_weight = $body_weight;
        $this->email_patient = $email_patient;
        $this->phone_patient = $phone_patient;

        $this->name_patient = htmlspecialchars(strip_tags($this->name_patient));
        $this->surname_patient = htmlspecialchars(strip_tags($this->surname_patient));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->blood_group = htmlspecialchars(strip_tags($this->blood_group));
        $this->body_weight = htmlspecialchars(strip_tags($this->body_weight));
        $this->email_patient = htmlspecialchars(strip_tags($this->email_patient));
        $this->phone_patient = htmlspecialchars(strip_tags($this->phone_patient));

        $createQuery = "INSERT INTO bdmsystem.patient(name_patient,surname_patient,gender,blood_group,body_weight,email_patient,phone_patient)
        VALUES (:name_patient,:surname_patient,:gender,:blood_group,:body_weight,:email_patient,:phone_patient)";

        $createPatient = parent::SetConnection()->prepare($createQuery);

        $createPatient->bindParam(":name_patient",$this->name_patient);
        $createPatient->bindParam(":surname_patient",$this->surname_patient);
        $createPatient->bindParam(":gender",$this->gender);
        $createPatient->bindParam(":blood_group",$this->blood_group);
        $createPatient->bindParam(":body_weight",$this->body_weight);
        $createPatient->bindParam(":email_patient",$this->email_patient);
        $createPatient->bindParam(":phone_patient",$this->phone_patient);

        $json_outside = array();

        if (!isset($this->name_patient) || empty($this->name_patient) || !ctype_upper($this->name_patient[0])) {
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }else if(!isset($this->surname_patient) || empty($this->surname_patient) || !ctype_upper($this->surname_patient[0])) {
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }else if(!isset($this->gender) || empty($this->gender)) {
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(!isset($this->blood_group) || empty($this->blood_group)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(!isset($this->body_weight) || empty($this->body_weight)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(!isset($this->email_patient) || empty($this->email_patient) || !filter_var($this->email_patient,FILTER_VALIDATE_EMAIL)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif(strlen($this->phone_patient) < 6 || !isset($this->phone_patient) || empty($this->phone_patient)){
            $json_array = array(
                "status" => false,
                "message" => "Something is wrong with your inputs!"
            );
        }elseif ($createPatient->execute()) {
            $json_array = array(
                "status" => true,
                "message" => "You have successfully registered."
            );
        }

        array_push($json_outside,$json_array);
        return print_r(json_encode($json_outside));

    }


    public function SearchPatient($blood_group)
    {

        $this->blood_group = $blood_group;
        
        $selectQuery = "SELECT id_patient,name_patient,surname_patient,gender,blood_group,body_weight,email_patient,phone_patient
        FROM bdmsystem.patient
        WHERE blood_group LIKE '%$this->blood_group'";

        $selectPatient = parent::SetConnection()->prepare($selectQuery);

        $selectPatient->execute();

        $json_outside = array();

        if ($selectPatient->rowCount() > 0) {
            while ($red = $selectPatient->fetch(PDO::FETCH_ASSOC)) {
                $json_array = array(
                    "id_patient" => $red["id_patient"],
                    "name_patient" => $red["name_patient"],
                    "surname_patient" => $red["surname_patient"],
                    "gender" => $red["gender"],
                    "blood_group" => $red["blood_group"],
                    "body_weight" => $red["body_weight"],
                    "email_patient" => $red["email_patient"],
                    "phone_patient" => $red["phone_patient"]
                );
                array_push($json_outside,$json_array);
            }
        }else{
            $json_array = array(
                "message" => "No found!"
            );
            array_push($json_outside,$json_array);
        }

        return print_r(json_encode($json_outside));
    }

    function DeletePatient($id_patient){

        $this->id_patient = $id_patient;

        $deleteQuery = "DELETE FROM bdmsystem.patient WHERE id_patient = :id_patient";

        $deleteDonor = parent::SetConnection()->prepare($deleteQuery);

        $deleteDonor->bindParam(":id_patient",$this->id_patient);

        $json_outside = array();

        if(!isset($this->id_patient) || empty($this->id_patient)){
            $json_array = array(
                "status" => false,
                "message" => "It is come to an error!"
            );
        }elseif($deleteDonor->execute()){
            $json_array = array(
                "status" => true,
                "message" => "You have successfully deleted patient."
            );
        }

        array_push($json_outside,$json_array);
        return print_r(json_encode($json_outside));
    }



}



?>