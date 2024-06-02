var app = angular.module("myapp", ['ngCookies']);
app.controller("myappCtrl", function($scope, $cookies, $cookieStore, $http) 
{
	
/****************************************************************************/
/************************** Get Admin Details ***********************************/
/****************************************************************************/	
	$scope.cook_admin_email = $cookieStore.get("cook_admin_email");
	$scope.cook_user_email = $cookieStore.get("cook_user_email");


	
/****************************************************************************/
/************************** User Logout ************************************/
/****************************************************************************/		
	$scope.admin_logout = function() 
	{
		if(confirm("Are You Sure?"))
		{
			$cookies.cook_admin_email = "";
			$cookies.cook_user_email = "";
			window.location = "index.html";
			return;
		}
		else
		{
			return false;
		}
	}
/****************************************************************************/
/************************** Add Complaint *********************************/
/****************************************************************************/

	$http.post('http://10.0.2.2/projects/women_legal/web/get_business_all.php')
	.success(function(data, status, headers, config) 
	{
			$scope.all_business_details = data.details;
    });
	
	
	$scope.complaint_status = function(cus_id) 
	{		
		window.location = "admin_post_complaint.html";
		$cookieStore.put("cook_cus_id",cus_id);
		return;				
    }
	$scope.cook_cus_id = $cookieStore.get("cook_cus_id");

	$scope.complaint_solution = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/complaint_status.php', {
		'field_9':$scope.field_9,'field_10':$scope.field_10,
		'field_11':$scope.field_11,	'cus_id':$scope.cook_cus_id
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Submitted Successfully");
				window.location = "admin_view_complaint.html";
				return;				
			}
			else if(data.success == 2)
			{
				alert("Please Fill All Fields");
			}
			else
				{
					alert("Un Successfully");
				}
        });
    }
/****************************************************************************/
/************************** All Complaint *********************************/
/****************************************************************************/

	$http.post('http://10.0.2.2/projects/women_legal/web/complaint_get_all.php')
	.success(function(data, status, headers, config) 
	{
		if(data.success == 1)
		{
			$scope.details = data.details;
		}
		else
		{
			$scope.details = "No Data Found !!!";
		}
    });
	
	
/****************************************************************************/
/************************** Add Requriments *********************************/
/****************************************************************************/
	
	$scope.create_requirment = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/create_order.php', {
		'field_1':$scope.field_1,'field_2':$scope.field_2,'field_3':$scope.field_3,
		'field_4':$scope.field_4,'email':$scope.cook_user_email
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Requirment Submitted Successfully");
				window.location = "home.html";
				return;				
			}
			else if(data.success == 2)
			{
				alert("Please Fill All Fields");
			}
			else
				{
					alert("Un Successfully");
				}
        });
    }
	
/****************************************************************************/
/************************** Admin Update Order Requirment *******************/
/****************************************************************************/
	$scope.order_status = function(myorder_id,field_5,field_7,field_8,field_9) 
	{		
		window.location = "admin_post_requirments.html";
		$cookieStore.put("cook_myorder_id",myorder_id);
		$cookieStore.put("cook_req_5",field_5);
		$cookieStore.put("cook_req_7",field_7);
		$cookieStore.put("cook_req_8",field_8);
		$cookieStore.put("cook_req_9",field_9);
		return;				
    }
	
	$scope.cook_myorder_id = $cookieStore.get("cook_myorder_id");
	$scope.cook_req_5 = $cookieStore.get("cook_req_5");
	$scope.cook_req_7 = $cookieStore.get("cook_req_7");
	$scope.cook_req_8 = $cookieStore.get("cook_req_8");
	$scope.cook_req_9 = $cookieStore.get("cook_req_9");

	$scope.order_solution = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/order_solution.php', {
		'field_5':$scope.cook_req_5,'field_7':$scope.cook_req_7,'field_8':$scope.cook_req_8,
		'field_9':$scope.cook_req_9,'myorder_id':$scope.cook_myorder_id
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Submitted Successfully");
				window.location = "admin_view_requirments.html";
				return;				
			}
			else if(data.success == 2)
			{
				alert("Please Fill All Fields");
			}
			else
				{
					alert("Un Successfully");
				}
        });
    }
/****************************************************************************/
/************************** View All Requirment *****************************/
/****************************************************************************/
	$http.post('http://10.0.2.2/projects/women_legal/web/requirment_get_all.php')
	.success(function(data, status, headers, config) 
	{
		if(data.success == 1)
		{
			$scope.alldetails = data.alldetails;
		}
		else
		{
			$scope.alldetails = "No Data Found !!!";
		}
    });


/****************************************************************************/
/************************** Admin Update Complaints Solutions ***************/
/****************************************************************************/
	$scope.post_complaint_solution = function(cus_id,field_9,field_10,field_11) 
	{		
		window.location = "admin_post_complaint.html";
		$cookieStore.put("cook_cus_id",cus_id);
		$cookieStore.put("cook_field_9",field_9);
		$cookieStore.put("cook_field_10",field_10);
		$cookieStore.put("cook_field_11",field_11);
		return;				
    }
	$scope.cook_cus_id = $cookieStore.get("cook_cus_id");
	$scope.cook_field_9 = $cookieStore.get("cook_field_9");
	$scope.cook_field_10 = $cookieStore.get("cook_field_10");
	$scope.cook_field_11 = $cookieStore.get("cook_field_11");

	$scope.admin_complaint_solution = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/admin_complaint_solution.php', {
		'cook_field_9':$scope.cook_field_9,'cook_field_10':$scope.cook_field_10,
		'cook_field_11':$scope.cook_field_11,'cook_cus_id':$scope.cook_cus_id
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Submitted Successfully");
				window.location = "admin_view_complaint.html";
				return;				
			}
			else if(data.success == 2)
			{
				alert("Please Fill All Fields");
			}
			else
				{
					alert("Un Successfully");
				}
        });
    }
	

/****************************************************************************/
/************************** View All Requirment *****************************/
/****************************************************************************/
	$http.post('http://10.0.2.2/projects/women_legal/web/customer_get.php')
	.success(function(data, status, headers, config) 
	{
		if(data.success == 1)
		{
			$scope.cus_details = data.details;
		}
		else
		{
			$scope.cus_details = "No Data Found !!!";
		}
    });


	/****************************************************************************/
/************************** Contract Status Update *********************************/
/****************************************************************************/
	
$scope.update_status_con = function(cus_id,field_9) 
	{
		window.location = "con_status_edit.html";
		$cookieStore.put("cook_con_id",cus_id);
		$cookieStore.put("cook_con_status",field_9);
		
		return;
	}	
	
	$scope.cook_con_id = $cookieStore.get("cook_con_id");
	$scope.cook_con_status = $cookieStore.get("cook_con_status");

	$scope.save_con_status = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/con_update_status.php',{
		 'cus_id':$scope.cook_con_id, 'field_9':$scope.cook_con_status})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Submited successfully");
				window.location = "view_con_details.html";
				return;				
			}
			else
			{
				alert("Invalid Inputs");
			}   
          });
     }

	
});