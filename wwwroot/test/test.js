const submit = document.getElementById('submit')
// const userName = document.getElementById('user_name')
// const userAge = document.getElementById('user_age')
const res = document.getElementById('response')

submit.onclick = function (e) {
  e.preventDefault()
  // const name = userName.value
  // const age = userAge.value
  const xmlHttp = new XMLHttpRequest()
  // console.log(xmlHttp)
  xmlHttp.onreadystatechange = function () {
    if(xmlHttp.readyState === 4 && xmlHttp.status === 200) {
      console.log(xmlHttp.response)
    }
    // else{
    //   res.innerText = "请求发生错误"
    // }
  }
  xmlHttp.open('DELETE', "/api/affair.php", true)
  // xmlHttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded')
  xmlHttp.setRequestHeader('content-type', 'application/json')
  xmlHttp.send(
    "username='sunzi'&type='life'"
  )
}