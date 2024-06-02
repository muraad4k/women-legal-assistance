var app = angular.module("myapp", ['ngCookies']);
app.controller("myappCtrl", function($scope, $cookies, $cookieStore, $http) 
{
	
/****************************************************************************/
/************************** Get Admin Details ***********************************/
/****************************************************************************/	
	$scope.cook_admin_email = $cookieStore.get("cook_admin_email");
	$scope.cook_user_email = $cookieStore.get("cook_user_email");
	$scope.cook_staff_dept = $cookieStore.get("cook_staff_dept");
	$scope.cook_work_email = $cookieStore.get("cook_work_email");

	$scope.user_logout = function() 
	{
		if(confirm("Are You Sure?"))
		{
			$cookies.cook_user_email = "";
			$cookies.cook_admin_email = "";
			window.location = "index.html";
			return;
		}
		else
		{
			return false;
		}
	}
	
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

$scope.update_id = function(cus_id) 
	{
		window.location = "get_geolocation.html";
		$cookieStore.put("cook_cus_id",cus_id);
		return;
	}	
	
	$scope.cook_cus_id = $cookieStore.get("cook_cus_id");
	
			
	$scope.update_location = function() 
	{		
	
		//$scope.get_Latitude = document.getElementById('get_Latitude').value;
		//$scope.get_Longitude = document.getElementById('get_Longitude').value;
		
        $http.post('http://10.0.2.2/projects/women_legal/web/update_location.php', 
			{	
			'field_1': $scope.field_1, 'field_2':$scope.field_2,
			'email':$scope.cook_cus_id
			})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Updated Successful");
				window.location = "view_own_business.html";
				//location.reload(); 
				return;				
			}
			else if(data.success == 2)
			{
				alert("Please Fill All Fields");
			}
			else
			{
				alert("Login Unsuccessful");
			}
        });
    }
	
		
	
	
	
	
	$http.post('http://10.0.2.2/projects/women_legal/web/get_business_all.php')
	.success(function(data, status, headers, config) 
	{
			$scope.all_business_details = data.details;
    });
	
	
	$scope.more_info = function(cus_id) 
	{
		window.location = "view_business_more.html";
		$cookieStore.put("cook_bus_id",cus_id);
		return;
	}	
	
	$scope.cook_bus_id = $cookieStore.get("cook_bus_id");

	$scope.view_rating = function(cus_id) 
	{
		window.location = "view_business_rating.html";
		$cookieStore.put("cook_cus_id",cus_id);
		return;
	}	
	
	$scope.cook_cus_id = $cookieStore.get("cook_cus_id");

	$http.post('http://10.0.2.2/projects/women_legal/web/get_survey_choice_user.php')
		.success(function(data, status, headers, config) 
		{
			$scope.user_survey_choice_details = data.details;
        });
		
	$http.post('http://10.0.2.2/projects/women_legal/web/get_bus_more.php', {'id': $scope.cook_bus_id})
	.success(function(data, status, headers, config) 
	{
			$scope.more_details = data.details;
    });
	
	$http.post('http://10.0.2.2/projects/women_legal/web/get_user_rating.php', {'email': $scope.cook_user_email})
	.success(function(data, status, headers, config) 
	{
			$scope.user_rating_details = data.details;
    });
	
	$http.post('http://10.0.2.2/projects/women_legal/web/get_bus_rating.php', {'email': $scope.cook_cus_id})
	.success(function(data, status, headers, config) 
	{
			$scope.bus_rating_details = data.details;
    });
	
	
/****************************************************************************/
/************************** Add Complaint *********************************/
/****************************************************************************/
	$scope.create_business = function() 
	{				
		$http.post('http://10.0.2.2/projects/women_legal/web/create_business.php', {
		'field_1':$scope.field_1,'field_2':$scope.field_2,'field_3':$scope.field_3,
		'field_4':$scope.field_4,'field_5':$scope.field_5,'field_6':$scope.field_6,
		'field_7':$scope.field_7,'field_8':$scope.field_8,'field_9':$scope.field_9,
		'field_11':$scope.field_11,'email':$scope.cook_work_email
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Created Successfully");
				window.location = "home.html";
				return;				
			}
			else if(data.success == 2)
			{
				alert("Please Fill All Fields");
			}
			else if(data.success == 3)
			{
				alert("Enter 10 Digit Mobile No");
			}
			else
			{
				alert("Un Successfully");
			}
        });
    }
	
	
	$scope.create_problem = function() 
	{				
		$http.post('http://10.0.2.2/projects/women_legal/web/create_problem.php', {
		'field_1':$scope.field_1,'field_2':$scope.field_2,'field_3':$scope.field_3,
		'field_4':$scope.field_4,'field_5':$scope.field_5,'field_6':$scope.field_6,
		'email':$scope.cook_user_email
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Created Successfully");
				window.location = "user_home.html";
				return;				
			}
			else if(data.success == 2)
			{
				alert("Please Fill All Fields");
			}
			else if(data.success == 3)
			{
				alert("Enter 10 Digit Mobile No");
			}
			else
			{
				alert("Un Successfully");
			}
        });
    }
/****************************************************************************/
/************************** admin Details *********************************/
/****************************************************************************/
	$http.post('http://10.0.2.2/projects/women_legal/web/admin_get.php')
	.success(function(data, status, headers, config) 
	{
		if(data.success == 1)
		{
			$scope.admin_details = data.details;
		}
		else
		{
			$scope.admin_details = "No Data Found !!!";
		}
    });
/****************************************************************************/
/************************** Get Feedback *********************************/
/****************************************************************************/
	$http.post('http://10.0.2.2/projects/women_legal/web/feedback_get.php', {	'email':$scope.cook_work_email})
	.success(function(data, status, headers, config) 
	{
		if(data.success == 1)
		{
			$scope.feedback_details = data.details;
		}
		else
		{
			$scope.feedback_details = "No Data Found !!!";
		}
    });
/****************************************************************************/
/************************** Get All details  *********************************/
/****************************************************************************/
	$http.post('http://10.0.2.2/projects/women_legal/web/get_business_user.php')
	.success(function(data, status, headers, config) 
	{
			$scope.user_bus_details = data.details;
    });
	
	$http.post('http://10.0.2.2/projects/women_legal/web/get_all_problem.php')
	.success(function(data, status, headers, config) 
	{
			$scope.user_problem_details = data.details;
    });
	
	$http.post('http://10.0.2.2/projects/women_legal/web/get_business.php', {'email':$scope.cook_work_email})
	.success(function(data, status, headers, config) 
	{
			$scope.details = data.details;
    });
	
	
	
/****************************************************************************/
/************************** Add Requriments *********************************/
/****************************************************************************/
	$scope.create_feedback = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/create_feedback.php', 
		{
		'field_1':$scope.field_1,'field_2':$scope.field_2,'email':$scope.cook_field_1
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Feedback Submitted Successfully");
				window.location = "user_home.html";
				return;				
			}
			else if(data.success == 2)
			{
				alert("Please Fill All Fields");
			}
			else if(data.success == 0)
			{
				alert("Error In Creating");
			}
			else
				{
					alert("Un Successfully");
				}
        });
    }

	
/****************************************************************************/
/************************** User Update *********************************/
/****************************************************************************/
	
		$http.post('http://10.0.2.2/projects/women_legal/web/get_user_info.php',
		{
			'email':$scope.cook_user_email
		})
		.success(function(data, status, headers, config) 
		{
				$scope.userdetails = data.details;
          });
		  
$scope.user_update_info = function(name,password,mobile) 
	{
		window.location = "user_info_edit.html";
		$cookieStore.put("cook_name",name);
		$cookieStore.put("cook_password",password);
		$cookieStore.put("cook_mobile",mobile);
		return;
	}	
	
	$scope.cook_name = $cookieStore.get("cook_name");
	$scope.cook_password = $cookieStore.get("cook_password");
	$scope.cook_mobile = $cookieStore.get("cook_mobile");

	$scope.save_update_info = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/user_update_info.php',{
		 'name':$scope.cook_name, 'password':$scope.cook_password,
		 'mobile': $scope.cook_mobile, 'email': $scope.cook_user_email})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Submited successfully");
				window.location = "user_update_info.html";
				return;				
			}
			else
			{
				alert("Invalid Inputs");
			}   
          });
     }
	 
	 /****WORKER UPDATE***/
	 
	 
	 $http.post('http://10.0.2.2/projects/women_legal/web/get_worker_info.php',
		{
			'email':$scope.cook_work_email
		})
		.success(function(data, status, headers, config) 
		{
				$scope.workerdetails = data.details;
          });
	 
	 $scope.worker_update_info = function(name,password,mobile) 
	{
		window.location = "worker_info_edit.html";
		$cookieStore.put("cook_name",name);
		$cookieStore.put("cook_password",password);
		$cookieStore.put("cook_mobile",mobile);
		return;
	}	
	
	$scope.cook_name = $cookieStore.get("cook_name");
	$scope.cook_password = $cookieStore.get("cook_password");
	$scope.cook_mobile = $cookieStore.get("cook_mobile");

	$scope.save_update_worker = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/save_update_worker.php',{
		 'name':$scope.cook_name, 'password':$scope.cook_password,
		 'mobile': $scope.cook_mobile, 'email': $scope.cook_work_email})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Updated successfully");
				window.location = "worker_update_info.html";
				return;				
			}
			else
			{
				alert("Invalid Inputs");
			}   
          });
     }
	 
/****************************************************************************/
/************************** Delete Products *********************************/
/****************************************************************************/
	// products_delete
	$scope.delete_bus = function(cus_id) 
	{		
        $http.post('http://10.0.2.2/projects/women_legal/web/delete_bus.php', 
		{
		'id': cus_id
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Deleted Successful");
				window.location = "view_own_business.html";
				return;
			}
			else if(data.success == 0)
			{
				alert("Error While Deleting Product!!");
			}
			else
			{
				alert("No id found");
			}
        });
    }
	
	
	$scope.delete_problem = function(cus_id) 
	{		
        $http.post('http://10.0.2.2/projects/women_legal/web/delete_problem.php', 
		{
		'id': cus_id
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Deleted Successful");
				window.location = "view_problem.html";
				return;
			}
			else if(data.success == 0)
			{
				alert("Error While Deleting Product!!");
			}
			else
			{
				alert("No id found");
			}
        });
    }
	
	

	
	

/****************************************************************************/
/************************** Update *********************************/
/****************************************************************************/
$scope.update_business = function(cus_id,field_1,field_2,field_3,
								 field_4,field_5,field_6,field_7,field_8,field_10,field_11) 
	{
		window.location = "update_business.html";
		$cookieStore.put("cook_cus_id",cus_id);
		$cookieStore.put("cook_field_1",field_1);
		$cookieStore.put("cook_field_2",field_2);
		$cookieStore.put("cook_field_3",field_3);
		$cookieStore.put("cook_field_4",field_4);
		$cookieStore.put("cook_field_5",field_5);
		$cookieStore.put("cook_field_6",field_6);
		$cookieStore.put("cook_field_7",field_7);
		$cookieStore.put("cook_field_8",field_8);
		$cookieStore.put("cook_field_10",field_10);
		$cookieStore.put("cook_field_11",field_11);
		return;
	}	
	
	$scope.cook_cus_id = $cookieStore.get("cook_cus_id");
	$scope.cook_field_1 = $cookieStore.get("cook_field_1");
	$scope.cook_field_2 = $cookieStore.get("cook_field_2");
	$scope.cook_field_3 = $cookieStore.get("cook_field_3");
	$scope.cook_field_4 = $cookieStore.get("cook_field_4");
	$scope.cook_field_5 = $cookieStore.get("cook_field_5");
	$scope.cook_field_6 = $cookieStore.get("cook_field_6");
	$scope.cook_field_7 = $cookieStore.get("cook_field_7");
	$scope.cook_field_8 = $cookieStore.get("cook_field_8");
	$scope.cook_field_10 = $cookieStore.get("cook_field_10");
	$scope.cook_field_11 = $cookieStore.get("cook_field_11");

	$scope.save_business = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/save_business.php',{
		'id':$scope.cook_cus_id,'field_1':$scope.cook_field_1,'field_2':$scope.cook_field_2,
		'field_3':$scope.cook_field_3,'field_4':$scope.cook_field_4,'field_5':$scope.cook_field_5,'field_6':$scope.cook_field_6,'field_7':$scope.cook_field_7,'field_8':$scope.cook_field_8,'field_10':$scope.cook_field_10,'field_11':$scope.cook_field_11
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Submited successfully");
				window.location = "view_own_business.html";
				return;				
			}
			else
			{
				alert("Invalid Inputs");
			}   
          });
     }


/****************************************************************************/
/************************** Update *********************************/
/****************************************************************************/
$scope.update_problem = function(cus_id,field_1,field_2,field_3,
								 field_4,field_5,field_6) 
	{
		window.location = "update_problem.html";
		$cookieStore.put("cook_cus_id",cus_id);
		$cookieStore.put("cook_field_1",field_1);
		$cookieStore.put("cook_field_2",field_2);
		$cookieStore.put("cook_field_3",field_3);
		$cookieStore.put("cook_field_4",field_4);
		$cookieStore.put("cook_field_5",field_5);
		$cookieStore.put("cook_field_6",field_6);
		return;
	}	
	
	$scope.cook_cus_id = $cookieStore.get("cook_cus_id");
	$scope.cook_field_1 = $cookieStore.get("cook_field_1");
	$scope.cook_field_2 = $cookieStore.get("cook_field_2");
	$scope.cook_field_3 = $cookieStore.get("cook_field_3");
	$scope.cook_field_4 = $cookieStore.get("cook_field_4");
	$scope.cook_field_5 = $cookieStore.get("cook_field_5");
	$scope.cook_field_6 = $cookieStore.get("cook_field_6");

	$scope.save_problem = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/save_problem.php',{
		'id':$scope.cook_cus_id,'field_1':$scope.cook_field_1,'field_2':$scope.cook_field_2,
		'field_3':$scope.cook_field_3,'field_4':$scope.cook_field_4,'field_5':$scope.cook_field_5,'field_6':$scope.cook_field_6
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Submited successfully");
				window.location = "view_problem.html";
				return;				
			}
			else
			{
				alert("Invalid Inputs");
			}   
          });
     }


	/****************************************************************************/
/************************** Get All details  *********************************/
/****************************************************************************/
	$http.post('http://10.0.2.2/projects/women_legal/web/work_get.php')
	.success(function(data, status, headers, config) 
	{
		if(data.success == 1)
		{
			$scope.work_details = data.details;
		}
		else
		{
			$scope.work_details = "No Data Found !!!";
		}
    });
/****************************************************************************/
/************************** Create Survey Question **************************/
/************************** create_choice		 **************************/
/****************************************************************************/
$scope.update_survey = function(cus_id,email) 
	{
		window.location = "post_feedback.html";
		$cookieStore.put("cook_cus_id",cus_id);
		$cookieStore.put("cook_field_1",email);
		return;
	}	
	
$scope.submit_survey = function() 
	{
		window.location = "view_rating_user.html";
		return;
	}	
	
	$scope.cook_cus_id = $cookieStore.get("cook_cus_id");
	$scope.cook_field_1 = $cookieStore.get("cook_field_1");

	
	$scope.create_choice_user = function(field_2,field_3,field_4,
					field_5,field_6,field_7,field_8,field_9) 
	{		
        $http.post('http://10.0.2.2/projects/women_legal/web/create_choice_user.php', 
		{
		'id': $scope.cook_cus_id,'email': $scope.cook_field_1,
		'field_2': field_2,'field_3': field_3,'field_4': field_4,
		'field_5': field_5,'field_6': field_6,'field_7': field_7,
		'field_8': field_8,'field_9': field_9,
		'field_10': $scope.cook_user_email
		})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				//alert("Successful");
				//window.location = "survey_answer.html";
				//return;
			}
			else if(data.success == 0)
			{
				alert("Failed!!");
			}
			else
			{
				alert("No id found");
			}
        });
    }

	
	 
/****************************************************************************/
/************************** Get All User details  *********************************/
/****************************************************************************/
	$http.post('http://10.0.2.2/projects/women_legal/web/user_get_all.php')
	.success(function(data, status, headers, config) 
	{
		if(data.success == 1)
		{
			$scope.all_user_details = data.details;
		}
		else
		{
			$scope.all_user_details = "No Data Found !!!";
		}
    });
	



$scope.share_location = function(email) 
	{
		window.location = "get_geolocation_2.html";
		$cookieStore.put("cook_email",email);
		return;
	}	
	
	$scope.cook_email = $cookieStore.get("cook_email");
	
			
	$scope.update_location_2 = function() 
	{		
	
		//$scope.get_Latitude = document.getElementById('get_Latitude').value;
		//$scope.get_Longitude = document.getElementById('get_Longitude').value;
		
        $http.post('http://10.0.2.2/projects/women_legal/web/update_location_2.php', 
			{	
			'field_1': $scope.field_1, 'field_2':$scope.field_2,
			'field_3':$scope.field_3,'field_4':$scope.cook_user_email,
			'email':$scope.cook_email
			})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Updated Successful");
				window.location = "view_user_request.html";
				//location.reload(); 
				return;				
			}
			else if(data.success == 2)
			{
				alert("Please Fill All Fields");
			}
			else
			{
				alert("Login Unsuccessful");
			}
        });
    }
	

	$http.post('http://10.0.2.2/projects/women_legal/web/get_user_request.php')
	.success(function(data, status, headers, config) 
	{
			$scope.user_request_details = data.details;
    });
	
	
$scope.update_status_2 = function(cus_id,field_5) 
	{
		window.location = "con_status_edit_2.html";
		$cookieStore.put("cook_con_id",cus_id);
		$cookieStore.put("cook_con_status",field_5);
		
		return;
	}	
	
	$scope.cook_con_id = $cookieStore.get("cook_con_id");
	$scope.cook_con_status = $cookieStore.get("cook_con_status");

	$scope.save_con_status_2 = function() 
	{		
		$http.post('http://10.0.2.2/projects/women_legal/web/con_update_status_2.php',{
		 'cus_id':$scope.cook_con_id, 'field_9':$scope.cook_con_status})
		.success(function(data, status, headers, config) 
		{
			if(data.success == 1)
			{
				alert("Submited successfully");
				window.location = "view_my_request.html";
				return;				
			}
			else
			{
				alert("Invalid Inputs");
			}   
          });
     }
	 
	 
	$scope.upload_photo = function(cus_id) 
	{
		window.location = "file.html";
		$cookieStore.put("cook_cus_id",cus_id);
		return;
	}	
	
	$scope.cook_cus_id = $cookieStore.get("cook_cus_id");
	 
	 

	
	
});