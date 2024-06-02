<!DOCTYPE html>
<html ng-app="myapp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
     <title>Women Legal App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="css/font.css" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/lineicons.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
	<script src="js/angular-1.3.js"></script>
	<script src="js/angular_cookies.js"></script>
</head>
	
  <body   ng-controller="myappCtrl">
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
  <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="admin_home.html"><img src="img/core-img/logo-small.png" alt="">&nbsp; &nbsp; Women Legal App</a></div>
       
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas"><span></span><span></span><span></span></div>
      </div>
    </div>
    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
      <!-- Close button-->
      <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <!-- Offcanvas body-->
      <div class="offcanvas-body">
        <!-- Sidenav Profile-->
        <div class="sidenav-profile">
          <div class="user-profile"><img src="img/bg-img/9.png" alt=""></div>
          <div class="user-info">
            <h6 class="user-name mb-1">Women Legal App</h6>
          
          </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
        
          
             
          <li><a href="home.html"><i class="lni lni-home
"></i>Home</a></li>
          <li><a href="post_business.html"><i class="lni lni-plus
"></i>Create Business</a></li>
           <li><a href="view_own_business.html"><i class="lni lni-pencil-alt
"></i>Update Business</a></li>
		    <li><a href="view_feedback.html"><i class="lni lni-list
"></i>View Feedback</a></li>
           <li><a style="color:white;" ng-click="user_logout()"><i class="lni lni-power-switch"></i>Logout</a></li>
          
      </div>
    </div>
      </div>
    </div>
 
    
<div class="wrapper">
    <div class="content-wrapper">

    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">report of payment</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <form id="userForm">
                <div class="row m-2">
                  <div class="col-sm-4">
                    <select name="type" id="type" class="form-control">
                      <option value="" selected >select choice</option>
                      <option value="0" >ALL</option>
                      <option value="custom"> custom</option>
                      <option value="1" >Aprove</option>
                      <option value="2" >Pending</option>
                      <option value="3" >Reject</option>


                    </select>
                  </div>
                  <div class="col-sm-4">
                    <input type="date" name="from" id="from" class="form-control">
                  </div>
                  <div class="col-sm-4">
                    <input type="date" name="to" id="to"  class="form-control">
                  </div>
                  <button class="btn btn-info m-3" id="addNew" type="submit">make report</button>
                </div>
                </form>
                <div id="print_area" >
                <table class="table m-2" id="userTable">
                  <thead>
                    <!-- <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Fee</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>month</th>
                    </tr> -->
                  </thead>
                  <tbody>
          
                  </tbody>
                </table>
              </div>
              <button class="btn btn-success m-2" id="print"><i class="fa fa-print p-2"></i>Print</button>
                
              </div>
              <!-- /.card-body -->
            </div>





    </div>
</div>
 <!-- Content Wrapper. Contains page content -->


    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
     <div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class="active"><a href="home.html"><i class="lni lni-home"></i>Home</a></li>
            
            <li><a href="settings.html"><i class="lni lni-cog"></i>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/dark-mode-switch.js"></script>
    <script src="js/no-internet.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script><script src="js/angular_data.js"></script>
    <script>
$("#from").attr("disabled",true);
$("#to").attr("disabled",true);
$("#type").on("change",function(){
  if($("#type").val()==0){
  $("#userTable tr").html("");

    $("#from").attr("disabled",true);
    $("#to").attr("disabled",true); 
    let sendingData = {
      "table":"advocate",
      "reportAll":"readAdvocate"
  } 
    $.ajax({
      method: "POST",
      url: "./include/operation.php",
      data: sendingData,
      dataType: "JSON",
      success:function(data){
        let status=data.status;
        let response=data.data
        let html='';
        let tr='';
        let th='';
        if(status){
          response.forEach(res=>{
           th="<tr>";
            for(let r in res){
          //     // if(r=="fee"){
          //       // if(res[r]==1){
          //     //   tr+=`<td> unpaid </td>`;}
          //     //   tr+=`<td>paid</td>`;
          //     //  }
              th+=`<th> ${r} </th>`;
            }
            

            th+="</tr>";
            tr+="<tr>";
            for(let r in res){
             if(r=="fee"){
              if(res[r]==2){
                tr+="<td>paid</td>"
              }
              else
              tr+="<td>unpaid</td>"
             }
             else
              tr+=`<td> ${res[r]} </td>`;
            }
            

            tr+="</tr>";
          })
          $("#userTable thead").append(th);
          $("#userTable tbody").append(tr);
          
        }
        else{

          alert(response);
        }
      },
      error: (response)=>{
console.log(response)
      }

})





      }
      else if($("#type").val()==1){
        $("#userTable tr").html("");

  let sendingData = {
       "fee":'Approval',
       "table":"advocate",
      "readpaid":"readpaid"
  } 
    $.ajax({
      method: "POST",
      url: "./include/operation.php",
      data: sendingData,
      dataType: "JSON",
      success:function(data){
        let status=data.status;
        let response=data.data
        let html='';
        let tr='';
        let th='';
        if(status){
          response.forEach(res=>{
           th="<tr>";
            for(let r in res){
          //     // if(r=="fee"){
          //       // if(res[r]==1){
          //     //   tr+=`<td> unpaid </td>`;}
          //     //   tr+=`<td>paid</td>`;
          //     //  }
              th+=`<th> ${r} </th>`;
            }
            

            th+="</tr>";
            tr+="<tr>";
            for(let r in res){
             if(r=="fee"){
              if(res[r]==2){
                tr+="<td>paid</td>"
              }
              else
              tr+="<td>unpaid</td>"
             }
             else
              tr+=`<td> ${res[r]} </td>`;
            }
            

            tr+="</tr>";
          })
          $("#userTable thead").append(th);
          $("#userTable tbody").append(tr);
          
        }
        else{

          alert(response);
        }
      },
      error: (response)=>{
console.log(response)
      }
})
      }
      else if($("#type").val()==2){
        $("#from").attr("disabled",true);
    $("#to").attr("disabled",true); 
        $("#userTable tr").html("");
        let sendingData = {
       "fee":'Pending',
       "table":"advocate",
      "readpaid":"readpaid"
  }  
    $.ajax({
      method: "POST",
      url: "./include/operation.php",
      data: sendingData,
      dataType: "JSON",
      success:function(data){
        let status=data.status;
        let response=data.data
        let html='';
        let tr='';
        let th='';
        if(status){
          response.forEach(res=>{
           th="<tr>";
            for(let r in res){
          //     // if(r=="fee"){
          //       // if(res[r]==1){
          //     //   tr+=`<td> unpaid </td>`;}
          //     //   tr+=`<td>paid</td>`;
          //     //  }
              th+=`<th> ${r} </th>`;
            }
            

            th+="</tr>";
            tr+="<tr>";
            for(let r in res){
             if(r=="fee"){
              if(res[r]==2){
                tr+="<td>paid</td>"
              }
              else
              tr+="<td>unpaid</td>"
             }
             else
              tr+=`<td> ${res[r]} </td>`;
            }
            

            tr+="</tr>";
          })
          $("#userTable thead").append(th);
          $("#userTable tbody").append(tr);
          
        }
        else{

          alert(response);
        }
      },
      error: (response)=>{
console.log(response)
      }

})
      }
      else if($("#type").val()==3){
        $("#from").attr("disabled",true);
    $("#to").attr("disabled",true); 
        $("#userTable tr").html("");
        let sendingData = {
       "fee":'Reject',
       "table":"advocate",
      "readpaid":"readpaid"
  }  
    $.ajax({
      method: "POST",
      url: "./include/operation.php",
      data: sendingData,
      dataType: "JSON",
      success:function(data){
        let status=data.status;
        let response=data.data
        let html='';
        let tr='';
        let th='';
        if(status){
          response.forEach(res=>{
           th="<tr>";
            for(let r in res){
          //     // if(r=="fee"){
          //       // if(res[r]==1){
          //     //   tr+=`<td> unpaid </td>`;}
          //     //   tr+=`<td>paid</td>`;
          //     //  }
              th+=`<th> ${r} </th>`;
            }
            

            th+="</tr>";
            tr+="<tr>";
            for(let r in res){
             if(r=="fee"){
              if(res[r]==2){
                tr+="<td>paid</td>"
              }
              else
              tr+="<td>unpaid</td>"
             }
             else
              tr+=`<td> ${res[r]} </td>`;
            }
            

            tr+="</tr>";
          })
          $("#userTable thead").append(th);
          $("#userTable tbody").append(tr);
          
        }
        else{

          alert(response);
        }
      },
      error: (response)=>{
console.log(response)
      }

})
      }
  else{
      $("#from").attr("disabled",false);
      $("#to").attr("disabled",false);
       }
})
$("#print").on("click",function(){
    print();
})
function print(){
  let printArea=document.querySelector("#print_area");
  let newWindow=window.open("");
  newWindow.document.write(`<html><head><title></title>`);
  newWindow.document.write(`<style media="print">
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
  body{
    font-family: 'Poppins', sans-serif;
  }
  table{width:100%}
  th{background-color:#04AA6D !important;
     color:white !important;
     
    }
    th , td{
      padding:15px !important;
      text-align:left !important;
    }
    th , td {
      border-bottom:1px solid #ddd !important;
    }
  </style>`);
  
  newWindow.document.write(`</head><body>`);
  newWindow.document.write(`<img width="100%;" height="200px;" src="../../dist/img/gym.jpg">`)
  newWindow.document.write(printArea.innerHTML);
  newWindow.document.write(`</body></html>`);

  newWindow.print();
  newWindow.close();
}
$("#userForm").on("submit",function(event){
  event.preventDefault();
  $("#userTable tr").html("");
  let from = $("#from").val();
  let to = $("#to").val();
  let sendingData = {
    "table":"advocate",
      "from":from,
      "to":to,
      "readpay":"readpay"
  } 
    $.ajax({
      method: "POST",
      url: "./include/operation.php",
      data: sendingData,
      dataType: "JSON",
      success:function(data){
        let status=data.status;
        let response=data.data
        let html='';
        let tr='';
        let th='';
        if(status){
          response.forEach(res=>{
           th="<tr>";
            for(let r in res){
          //     // if(r=="fee"){
          //       // if(res[r]==1){
          //     //   tr+=`<td> unpaid </td>`;}
          //     //   tr+=`<td>paid</td>`;
          //     //  }
              th+=`<th> ${r} </th>`;
            }
            

            th+="</tr>";
            tr+="<tr>";
            for(let r in res){
             if(r=="fee"){
              if(res[r]==2){
                tr+="<td>paid</td>"
              }
              else
              tr+="<td>unpaid</td>"
             }
             else
              tr+=`<td> ${res[r]} </td>`;
            }
            

            tr+="</tr>";
          })
          $("#userTable thead").append(th);
          $("#userTable tbody").append(tr);
          
        }
        else{

          alert(response);
        }
      },
      error: (response)=>{
console.log(response)
      }

})

})
function deleteMember(id){
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "Confirm to delete this record that has an id "+id,
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    deleteMemberAjax(id,(response)=>{
      swalWithBootstrapButtons.fire(
      'Deleted!',
      response[0],
      'success'
    )
    setTimeout(() => {
      window.location.reload();
    }, 2000);
    })
    
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})

  }
// document.querySelector(".delete").addEventListener("click",function(){
//  deleteMember(document.querySelector(".delete").getAttribute("memberID"));
// })

//   function deletAction(id){
   
//     alert("HELLO")
//   }


  function deleteMemberAjax(id,displayResponse){
    var data={
      "delete": "delete",
      "id": id,
      "table": "teachers"
    }
    $.ajax({
      method: "POST",
      url: "../include/operations.php",
      data: data,
      dataType: "JSON",
      success:(response)=>{
        displayResponse(response);
      },
      error: (response)=>{
console.log(response)
      }
    })
  }

function fillForm(id){
  $.ajax({
          type: "POST",
          dataType: 'JSON',
          url: '../include/ajax.php',
          data: {table:'teachers',id:id,action:'update'},
          success: function(response)
          {
            console.log(response)
              // var member = JSON.parse(response);
              // console.log(employee)
                // document.querySelector('#employeeid').value=response.response.id
                document.querySelector('#name').value=response.response.name
                document.querySelector('#id').value=response.response.id
                document.querySelector('#dob').value=response.response.dob
                document.querySelector('#phone').value=response.response.mobile
                document.querySelector('#waqti').value=response.response.shift
                document.querySelector('#address').value=response.response.address
   

         }
     });
}
</script>
		
 <body onload="onLoad()">		
	</body>
</html>