function testCommit () {
  return "Test file"
}

console.log(testCommit)

//Session Test
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 

if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
}
