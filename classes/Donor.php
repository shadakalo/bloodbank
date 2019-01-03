<?php 
	include "DB.php";
	class Donor{
		private $table='tbl_donor';
		private $table1='tbl_request';
		private $table2='tbl_member';
		private $table3='tbl_admin';
		private $id;
		private $name;
		private $blood;
		private $weight;
		private $gender;
		private $email;
		private $mobile;
		private $division;
		private $city;
		private $address;
		private $userid;
		private $pass;
		private $age;
		private $avail;
		private $dos;
		private $ndate;
		private $unit;
		private $disease;
		private $hname;
		private $pin;
		private $dob;
		private $joini;
		private $occu;
		private $image;
		public function setId($id){

			$this->id = $id;
		}
		public function setName($name){

			$this->name = $name;
		}
		public function setBlood($blood){

			$this->blood = $blood;
		}
		public function setWeight($weight){

			$this->weight = $weight;
		}
		public function setGender($gender){

			$this->gender = $gender;
		}
		public function setEmail($email){

			$this->email = $email;
		}
		public function setMobile($mobile){

			$this->mobile = $mobile;
		}
		public function setDivision($division){

			$this->division = $division;
		}
		public function setCity($city){

			$this->city = $city;
		}
		public function setAddress($address){

			$this->address = $address;
		}
		public function setUserid($userid){

			$this->userid = $userid;
		}
		public function setPass($pass){

			$this->pass = $pass;
		}
		public function setAge($age){

			$this->age = $age;
		}
		public function setAvail($avail){
			$this->avail = $avail;
		}
		public function setDos($dos){
			$this->dos = $dos;
		}
		public function setUnit($unit){
			$this->unit = $unit;
		}
		public function setDisease($disease){
			$this->disease = $disease;
		}
		public function setHname($hname){
			$this->hname = $hname;
		}
		public function setPin($pin){
			$this->pin = $pin;
		}
		public function setNdate($ndate){
			$this->ndate = $ndate;
		}
		public function setDob($dob){
			$this->dob = $dob;
		}
		public function setJoin($joini){
			$this->joini = $joini;
		}
		public function setOccu($occu){
			$this->occu = $occu;
		}
		
		public  function insert(){
			$sql1 = "SELECT id FROM $this->table WHERE userid=:userid OR email= :email";
			$check = DB::prepare($sql1);
			$check->bindparam(':userid',$this->userid);
			$check->bindparam(':email',$this->email);
			$check->execute();
			$num = $check->rowcount();
			if ($num == 0) {				
			$sql ="INSERT INTO $this->table(name, blood, weight, gender, email, mobile, division, city, address, userid, pass, age, avail) VALUES(:name, :blood, :weight, :gender, :email, :mobile, :division, :city, :address, :userid, :pass, :age, :avail)";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':name',$this->name);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':weight',$this->weight);
			$stmt->bindparam(':gender',$this->gender);
			$stmt->bindparam(':email',$this->email);
			$stmt->bindparam(':mobile',$this->mobile);
			$stmt->bindparam(':division',$this->division);
			$stmt->bindparam(':city',$this->city);
			$stmt->bindparam(':address',$this->address);
			$stmt->bindparam(':userid',$this->userid);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->bindparam(':age',$this->age);
			$stmt->bindparam(':avail',$this->avail);
		    $stmt->execute();
		    return print "<center><span style='color : green;'> <h3><< Registration Successfull >></h3></span>
		    </center>";
			}else{
				return print "<span style='color:red'> * Error....User Id/Email already exists</span> ";
			}
		}
		public function readAll(){
			$sql="SELECT * FROM $this->table";
			$stmt= DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		public function logIn(){
			$sql = "SELECT id , userid FROM $this->table WHERE email=:email AND pass=:pass";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':email',$this->email);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->execute();
			$userdata = $stmt->fetch();
			$num = $stmt->rowcount();
			if ($num == 1) {
				@ob_start();
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['uid']   = $userdata['id'];
				$_SESSION['usid']  = $userdata['userid'];
				$_SESSION['msg']  = 'donor';
				return true;
			}else {
				return false;
			}
		}
		public function getSession(){
			return @$_SESSION['login'];
		}
		public function readUser(){
			$sql="SELECT * FROM $this->table where id=:id And userid= :userid";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			$stmt->bindparam(':userid',$this->userid);
			$stmt->execute();
			return $stmt->fetch();
		}
		public function readDonor(){
			$sql="SELECT * FROM $this->table where id=:id ";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function profileUpdate($id){

			$sql="UPDATE $this->table SET name=:name, blood=:blood, weight=:weight, mobile=:mobile, division=:division, city=:city, address=:address, age=:age, avail=:avail WHERE id=:id";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':name',$this->name);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':weight',$this->weight);
			$stmt->bindparam(':mobile',$this->mobile);
			$stmt->bindparam(':division',$this->division);
			$stmt->bindparam(':city',$this->city);
			$stmt->bindparam(':address',$this->address);
			$stmt->bindparam(':age',$this->age);
			$stmt->bindparam(':avail',$this->avail);
			$stmt->bindparam(':id',$this->id);
			return $stmt->execute();

		}
		public function deleteUser($id){
			$sql="DELETE FROM $this->table where id=:id";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			return $stmt->execute();
			

		}
		public function logoutUser(){
			$_SESSION['login'] = false;
			unset($_SESSION['uid'] );
			unset($_SESSION['usid']);
			session_destroy();
		}
		public function checkPass(){

			$sql="SELECT * FROM $this->table where id=:id And pass= :pass";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->execute();
			$num = $stmt->rowcount();
			if ($num == 0) {
				return false;
			}else{
				return true;
			}

		}

		public function changePass(){
			$sql="UPDATE $this->table SET pass = :pass WHERE id = :id";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->bindparam(':id',$this->id);
			return $stmt->execute();

		}

		public function donorSearchByAll(){

			$sql="SELECT * FROM $this->table where blood = :blood And division = :division And city = :city";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':division',$this->division);
			$stmt->bindparam(':city',$this->city);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		public function donorSearchBytwo(){

			$sql="SELECT * FROM $this->table where blood = :blood And division = :division ";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':division',$this->division);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		public function donorSearchBylasttwo(){

			$sql="SELECT * FROM $this->table where blood = :blood And city = :city ";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':city',$this->city);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		public function donorSearchByone(){

			$sql="SELECT * FROM $this->table where blood = :blood ";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		//request functions

		public function requestInsert(){

			$sql1 = "SELECT id FROM $this->table1 WHERE pin=:pin ";
			$check = DB::prepare($sql1);
			$check->bindparam(':pin',$this->pin);
			$check->execute();
			$num = $check->rowcount();

			if ($num == 0) {
				$sql ="INSERT INTO $this->table1(name, blood, age, ndate, unit, disease, email, mobile, hname, division, city, address, dos, pin) VALUES(:name, :blood, :age, :ndate, :unit, :disease, :email, :mobile, :hname, :division, :city, :address, :dos, :pin)";

			$stmt= DB::prepare($sql);
			$stmt->bindparam(':name',$this->name);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':age',$this->age);
			$stmt->bindparam(':ndate',$this->ndate);
			$stmt->bindparam(':unit',$this->unit);
			$stmt->bindparam(':disease',$this->disease);
			$stmt->bindparam(':email',$this->email);
			$stmt->bindparam(':mobile',$this->mobile);
			$stmt->bindparam(':hname',$this->hname);
			$stmt->bindparam(':division',$this->division);
			$stmt->bindparam(':city',$this->city);
			$stmt->bindparam(':address',$this->address);
			$stmt->bindparam(':dos',$this->dos);
			$stmt->bindparam(':pin',$this->pin);
		    $stmt->execute();

			return true;
			}else{
				return false;
			}

		}



		public function requestCheck(){

			$sql="SELECT * FROM $this->table1 where pin = :pin ";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':pin',$this->pin);
			$stmt->execute();
			$stmt->fetchAll();
			$num = $stmt->rowcount();
			if ($num == 0) {
				return false;
			}else{
				return true;
			}
		}

		public function readRequest(){
			$sql="SELECT * FROM $this->table1 where pin=:pin ";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':pin',$this->pin);
			$stmt->execute();
			return $stmt->fetch();
		}


		public function requestUpdate(){

			$sql="UPDATE $this->table1 SET name=:name, blood=:blood, age=:age, ndate=:ndate, unit=:unit, disease=:disease, email=:email, mobile=:mobile, hname=:hname, division=:division, city=:city, address=:address, dos=:dos WHERE pin=:pin";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':name',$this->name);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':age',$this->age);
			$stmt->bindparam(':ndate',$this->ndate);
			$stmt->bindparam(':unit',$this->unit);
			$stmt->bindparam(':disease',$this->disease);
			$stmt->bindparam(':email',$this->email);
			$stmt->bindparam(':mobile',$this->mobile);
			$stmt->bindparam(':hname',$this->hname);
			$stmt->bindparam(':division',$this->division);
			$stmt->bindparam(':city',$this->city);
			$stmt->bindparam(':address',$this->address);
			$stmt->bindparam(':dos',$this->dos);
			$stmt->bindparam(':pin',$this->pin);
		    return $stmt->execute();


		}
		public function readAllrequest(){
			$sql="SELECT * FROM $this->table1";
			$stmt= DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function readRequests(){
			$sql="SELECT * FROM $this->table1 where id=:id ";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			$stmt->execute();
			return $stmt->fetch();
		}
		public function deleteRequest($id){
			$sql="DELETE FROM $this->table1 where id=:id";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			return $stmt->execute();
			

		}


//member functions

		public  function memberInsert(){
			$sql1 = "SELECT id FROM $this->table2 WHERE userid=:userid OR email= :email";
			$check = DB::prepare($sql1);
			$check->bindparam(':userid',$this->userid);
			$check->bindparam(':email',$this->email);
			$check->execute();
			$num = $check->rowcount();
			if ($num == 0) {				
			$sql ="INSERT INTO $this->table2(userid, pass, name, blood, weight, gender, age, dob, email, mobile, address, joini, occu) VALUES(:userid, :pass, :name, :blood, :weight, :gender, :age, :dob, :email, :mobile, :address, :joini, :occu)";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':userid',$this->userid);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->bindparam(':name',$this->name);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':weight',$this->weight);
			$stmt->bindparam(':gender',$this->gender);
			$stmt->bindparam(':age',$this->age);
			$stmt->bindparam(':dob',$this->dob);
			$stmt->bindparam(':email',$this->email);
			$stmt->bindparam(':mobile',$this->mobile);
			$stmt->bindparam(':address',$this->address);
			$stmt->bindparam(':joini',$this->joini);
			$stmt->bindparam(':occu',$this->occu);
		    $stmt->execute();
		    return print "<center><span style='color : green;'> <h3><< Registration Successfull >></h3></span>
		    </center>";
			}else{
				return print "<span style='color:red'> * Error....User Id/Email already exists</span> ";
			}
		}

		public function memberlogIn(){
			$sql = "SELECT id , userid FROM $this->table2 WHERE email=:email AND pass=:pass";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':email',$this->email);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->execute();
			$userdata = $stmt->fetch();
			$num = $stmt->rowcount();
			if ($num == 1) {
				@ob_start();
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['uid']   = $userdata['id'];
				$_SESSION['usid']  = $userdata['userid'];
				$_SESSION['msg']  = 'member';
				return true;
			}else {
				return false;
			}
		}

		public function readMember(){
			$sql="SELECT * FROM $this->table2 where id=:id And userid= :userid";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			$stmt->bindparam(':userid',$this->userid);
			$stmt->execute();
			return $stmt->fetch();
		}

		public function deleteMember($id){
			$sql="DELETE FROM $this->table2 where id=:id";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			return $stmt->execute();
			

		}

		public function memberprofileUpdate($id){

			$sql="UPDATE $this->table2 SET name=:name, blood=:blood, weight=:weight, gender=:gender, age=:age, dob=:dob, mobile=:mobile,  address=:address, joini=:joini, occu=:occu  WHERE id=:id";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':name',$this->name);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':weight',$this->weight);
			$stmt->bindparam(':gender',$this->gender);
			$stmt->bindparam(':age',$this->age);
			$stmt->bindparam(':dob',$this->dob);
			$stmt->bindparam(':mobile',$this->mobile);
			$stmt->bindparam(':address',$this->address);
			$stmt->bindparam(':joini',$this->joini);
			$stmt->bindparam(':occu',$this->occu);
			$stmt->bindparam(':id',$this->id);
			return $stmt->execute();

		}

		public function checkmemberPass(){

			$sql="SELECT * FROM $this->table2 where id=:id And pass= :pass";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->execute();
			$num = $stmt->rowcount();
			if ($num == 0) {
				return false;
			}else{
				return true;
			}

		}

		public function changememberPass(){
			$sql="UPDATE $this->table2 SET pass = :pass WHERE id = :id";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->bindparam(':id',$this->id);
			return $stmt->execute();

		}

		public function readAllmember(){
			$sql="SELECT * FROM $this->table2";
			$stmt= DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function readMembers(){
			$sql="SELECT * FROM $this->table2 where id=:id ";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			$stmt->execute();
			return $stmt->fetch();
		}

//admin functions
		public function adminlogIn(){
			$sql = "SELECT id , userid FROM $this->table3 WHERE email=:email AND pass=:pass";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':email',$this->email);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->execute();
			$userdata = $stmt->fetch();
			$num = $stmt->rowcount();
			if ($num == 1) {
				@ob_start();
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['uid']   = $userdata['id'];
				$_SESSION['usid']  = $userdata['userid'];
				$_SESSION['msg']  = 'admin';
				return true;
			}else {
				return false;
			}
		}
		public function readAdmin(){
			$sql="SELECT * FROM $this->table3 where id=:id And userid= :userid";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			$stmt->bindparam(':userid',$this->userid);
			$stmt->execute();
			return $stmt->fetch();
		}
		public function adminprofileUpdate($id){

			$sql="UPDATE $this->table3 SET name=:name, blood=:blood, gender=:gender, age=:age, dob=:dob, mobile=:mobile,  address=:address  WHERE id=:id";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':name',$this->name);
			$stmt->bindparam(':blood',$this->blood);
			$stmt->bindparam(':gender',$this->gender);
			$stmt->bindparam(':age',$this->age);
			$stmt->bindparam(':dob',$this->dob);
			$stmt->bindparam(':mobile',$this->mobile);
			$stmt->bindparam(':address',$this->address);
			$stmt->bindparam(':id',$this->id);
			return $stmt->execute();


		}
		
		public function checkadminPass(){

			$sql="SELECT * FROM $this->table3 where id=:id And pass= :pass";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':id',$this->id);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->execute();
			$num = $stmt->rowcount();
			if ($num == 0) {
				return false;
			}else{
				return true;
			}

		}

		public function changeadminPass(){
			$sql="UPDATE $this->table3 SET pass = :pass WHERE id = :id";
			$stmt= DB::prepare($sql);
			$stmt->bindparam(':pass',$this->pass);
			$stmt->bindparam(':id',$this->id);
			return $stmt->execute();

		}


	




		
		

	}
 ?>