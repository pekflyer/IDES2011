	     <?php
	     error_reporting(E_ALL);
		 ini_set('display_errors', false);
     	 require_once('functions-db.php');
		 $db_control = new dataBase();
	     ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="all"/>
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="all"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js" type="text/javascript"></script>
<script src="scripts/jquery.quicksand.js" type="text/javascript"></script>
<script src="scripts/jquery.prettyPhoto.js" type="text/javascript"></script>

<title>IDES Graduates 2011</title>
</head>

<body>
	<script>
		
	jQuery(document).ready(
		function() 
		{
			// Alphabetic Sorting
			(function($) 
			{
				$.fn.sorted = function(customOptions) 
			  	{
					var options = 
					{
				  		reversed: false,
				  		by: function(a) 
				  		{ 
				  			return a.text(); 
						}
					};
					
					$.extend(options, customOptions);
					$data = $(this);
					arr = $data.get();
					
					arr.sort(function(a, b) 
					{
						var valA = options.by($(a));
					  	var valB = options.by($(b));
					  	if (options.reversed) 
					  	{
							return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;		
					  	} 
					  	else 
					  	{		
							return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
					  	}
					});
					
					return $(arr);
				};
			})(jQuery);
			
			//-----------------------------------------
			//	---------- Main Navigation -------------
			lastBlock = $("#home");
			maxWidth = 740;
			minWidth = 30;	
			
			// main navigation
			$("ul.mainContent li.mainNav").mousedown
			(
				function()
				{
					$(lastBlock).animate({width: minWidth+"px"}, { queue:false, duration:400});
					
					$(this).animate({width: maxWidth+"px"}, { queue:false, duration:400});
					lastBlock = this;
				}
			);
			
		
			//----------------------------------------------
			//	---------- Projects Navigation -------------
		
			// bind radiobuttons in the form
			var $filterGroup = $('#filter input[name="group"]');
			var $filterSort = $('#filter input[name="sort"]');
			
			// get all students images
			var $students = $('#students');
			var $studentsBackup; 
			
			var $groupToGet = 0;
			var $currentGroup = 0;
			var $prevGroup =  $('div#project_nav div#prevProj');
		    var $nextGroup =  $('div#project_nav div#nextProj');
		    
		    
			// DOMContentLoaded
			$(function() 
			{	
				// get projects container
				var $transitionType;
				var $projects = $('#projects_info');
				var $projectContent = $('#proj_content');
				
				// hide at start
				$projects.hide(); 
				$projectContent.hide();
				$('.sorting_box legend#view').css('width', 0);
				$('label#all').css('width', 0);
				
				// clone students to get a second collection
				var $data = $students.clone();
				$studentBackups = $data;
				
				// add change function to all radio btns
				$filterGroup.add($filterSort).change(function(e) 
				{
					if ($($filterGroup+':checked').val() == 'all') 
					{
						$transitionType = "Out";
						var $filteredData = $data.find('li');
					} 
					else 
					{
						$transitionType = "In";
						var $filteredData = $data.find('li[data-type=' + $($filterGroup+":checked").val() + ']');
					}
				
					// sorted by first name
					if ($('#filter input[name="sort"]:checked').val() == "first") 
					{
						var $sortedData = $filteredData.sorted(
						{
							by: function(v) 
							{
								return $(v).find('strong').text().toLowerCase();
							}
						});
					}
					
					// sorted by last name
					else if ($('#filter input[name="sort"]:checked').val() == "last") 
					{
						// if sorted by last name
					  	var $sortedData = $filteredData.sorted(
					  	{
							by: function(v) 
							{
								return $(v).find('div[data-type="last"]').text().toLowerCase();
							}
						});
					}  
		
		
					if($transitionType == "In") 
					{
						runQuicksand();
						$projects.delay(601).slideDown("slow");
						$projectContent.delay(601).slideDown("slow");
						$('label#all').delay(601).animate({width: '68px', paddingRight: 15}, "slow");
						$('.sorting_box legend#view').delay(601).animate({width: '29px', paddingRight: 15}, "slow");
						
					}
					else 
					{
						setTimeout(runQuicksand, 600);
						$projects.slideUp("slow");
						$projectContent.slideUp("slow");
						$('.sorting_box legend#view').animate({ width: 0, paddingRight: 0}, "slow");
						$('label#all').animate({ width: 0, paddingRight: 0}, "slow");
					}		
					
					
					function runQuicksand()
					{
						$students.quicksand($sortedData, 
						{
							duration: 600,
							easing: 'easeInOutQuad'
						});
					}
				
				});
			
	
			
			$prevGroup.mousedown(function(){getGroup("prev")});
			$nextGroup.mousedown(function(){getGroup("next")});
			
			$("a[rel^='prettyPhoto']").prettyPhoto(); 
			
			function getGroup(type)
			{
				if(type == "prev")
				{
					$groupToGet = parseInt($prevGroup.attr("data-type"));
					$currentGroup = $groupToGet == 6 ? 1 : $groupToGet+1;    		
				}
				else
				{
					$groupToGet = parseInt($nextGroup.attr("data-type"));
					$currentGroup = $groupToGet == 1 ? 6 : $groupToGet-1;    			
				}
				
				activateSelection();
				getGroupInfo($groupToGet);
				runQuicksand();
				//update prev/next btn
			}
			
			
			function activateSelection()
			{
				var $currentRadioBtn = $('div#groupBox input[data-type="'+$currentGroup+'"]');
				var $newRadioBtn = $('div#groupBox input[data-type="'+$groupToGet+'"]');
	
				//deactivate old
				$currentRadioBtn.attr("checked", false);
				$currentRadioBtn.parent().removeClass('focused');
				
				//activate new
				$newRadioBtn.attr("checked", "checked");
		        $newRadioBtn.parent().addClass('focused');
		        
		        //alert($currentRadioBtn.val());
		        //alert($newRadioBtn.val());
		        
		    }
			
			
			function runQuicksand()
			{
				// clone students to get a second collection
				var $data = $studentBackups.clone();
				
				//alert($('#students').find('li').length);
				
				var $filteredData = $data.find('li[data-type=' + $($filterGroup+":checked").val() + ']');
				
					
				// sorted by first name
				if ($('#filter input[name="sort"]:checked').val() == "first") 
				{
					var $sortedData = $filteredData.sorted(
					{
						by: function(v) 
						{
							return $(v).find('strong').text().toLowerCase();
						}
					});
				}
				
				// sorted by last name
				else if ($('#filter input[name="sort"]:checked').val() == "last") 
				{
					// if sorted by last name
				  	var $sortedData = $filteredData.sorted(
				  	{
						by: function(v) 
						{
							return $(v).find('div[data-type="last"]').text().toLowerCase();
						}
					});
				}
				
				$students.quicksand($sortedData, 
				{
					duration: 600,
					easing: 'easeInOutQuad'
				});
			}	
				
			
			// highlight the selected view option
			$('.sorting_box :radio').blur(updateSelectedStyle);
	    	$('.sorting_box :radio').change(updateSelectedStyle);
			$('.sorting_box :radio').focus(updateSelectedStyle);
	   		
	   		
	   		//change button style and get group info
			function updateSelectedStyle() 
	    	{
	    		var $groupID = $(this).attr('data-type');
	    		$groupID = parseInt($groupID);
	    		
	    		//alert($groupID);
	    		//ensure only actual groups can need to use ajax
	    		if($groupID > 0 && $groupID <= 6)
	    		{
	    			getGroupInfo($groupID);
		    	}
	    		
	    		$('.sorting_box :radio').parent().removeClass('focused');
		        $('.sorting_box :radio:checked').parent().addClass('focused');
		    }
		    
		    	
		    // get group information
		    function getGroupInfo(groupID)
		    {
		    	//var $groupID = parseInt(groupID);
		    	var $groupLogo = ""; //default
		    	var $groupName = "";
		    	var $groupClient = "";
		    	var $groupAbstract = "";
		    	
		    	<?php
		    	echo 'switch(groupID){';
		    		
			    	 	$query =  $db_control->query_forGroupHome();
						$i=1;
						while($row = mysql_fetch_array($query))
						{ 
							echo 'case '.$row['grp_id'].':';
							echo " \n"; 
							echo '$groupLogo = "'.$row['grp_name'].'";';
							echo " \n"; 
							echo '$groupName = "'.$row['grp_name'].'";';
							echo " \n";
							echo '$groupClient = "Client: '.$row['grp_client'].'";';
							echo " \n"; 
							echo '$groupAbstract = "'.$row['grp_abstract'].'";';
							echo " \n"; 
							echo "break;\n";
							$i++;
						}
					
		    	echo '};';
		    	?>
		    	
		    	// group name
		    	$('h1#proj_name').fadeOut("fast", function(){
    				$('h1#proj_name').html($groupName);
    				$('h1#proj_name').fadeIn("fast");
    			});
    
		    	// group client
		    	$('h3#proj_client').fadeOut("fast", function(){
		    		$('h3#proj_client').html($groupClient);
    				$('h3#proj_client').fadeIn("fast");
    			});
    			
    			// group logo and abstract
	    		var $index = $groupLogo.indexOf(' ');
	    		if($index == -1) $index = $groupLogo.length;
	    		
	    		$groupLogo = $groupLogo.slice(0, $index).toLowerCase();
	    		$('div#proj_logo').fadeOut("fast", function() {
	    			$('div#proj_content').html('<div id=\"proj_logo\"></div>'+$groupAbstract);
    				$('div#proj_logo').css('background-image', "url(images/logos/groups/"+$groupLogo+".png)");
    				$('div#proj_logo').fadeIn("fast");
    			});
				
				//update next/prev buttons
	    		var $prevGrp = groupID == 1 ? 6 : groupID-1;
	    		$prevGroup.attr("data-type", $prevGrp);
	    			    		
	    		var $nextGrp = groupID == 6 ? 1 : groupID+1;
	    		$nextGroup.attr("data-type", $nextGrp);
	    		
	    		}	
	    	});   
		});
		
	</script>	
	<div class="full">
		<div class="header"></div>
		<ul class="mainContent">
			<li class="mainNav" id="home" title="Home">
			  <div class="nav" id="nav_home"> 
		  	  <div class="content">
			        <div id="theme">
                    	<div id="map">
                        	<p>
                            	APRIL 16TH-19TH, 10AM-5MP<br />
                                UNIVERSITY CENTRE GALLERIA
                            </p>
                        	<img src="images/home/map.png" />
                            <p>
                            	PARKING AVAILABLE IN LOT 2<br />
								FREE PARKING ON WEEKENDS
                            </p>
                      </div>
		            <img src="images/home/exhibitlogo_green.png" /></div>
			    </div>
			  </div>    
      </li>
			<li class="mainNav" id="projects">
			  <div class="nav" id="nav_projects" title="Projects">
			    <div class="content">
			    	<div id="projects_info">
						<div id="proj_group">
							<h1 id="proj_name"></h1>
							<h3 id="proj_client"></h3>
						</div>
			    		<div id="project_nav">
			    			<div id="prevProj"></div>
			    			<div id="nextProj"></div>
			    		</div>
			    	</div>			    
					<ul id="students" class="image-grid">         
					<?php
					 	$query =  $db_control->query_getStudents();
						$i=1;
						while($row = mysql_fetch_array($query))
						{ 
							echo '<li data-id="id-'.$i.'" data-type="'.$row["grp_name"].'" title="'.$row["stu_fname"].' '.$row["std_lname"].'">';
							echo '<a rel="prettyPhoto[ajax]" href="student.php?std_id='.$row["stu_id"].'&iframe=true&width=800&height=510">';
							echo '<img src="./images/students/'.$row["stu_fname"].'_'.$row["std_lname"].'.jpg" /></a>';
							echo '<div class="StuName"><strong>'. $row["stu_fname"] .'</strong> ';
							echo '<div data-type="last">'.$row["std_lname"].'</div></div>';
							echo '</li>';
							$i++;
						}
					?>
					</ul>
					<div id="proj_content">
						<div id="proj_logo"></div>
					</div>
					<div class="sorting_box" id="filter">
						<fieldset id="groups">
							<legend id="view">View:</legend>
							<label id="all">
								<input type="radio" name="group" value="all" checked="checked" data-type="0">All Students</label>
							<legend>By group:</legend>
							<div id="groupBox">
								<label id="rim"><input type="radio" name="group" value="rim" data-type="1">Mobile Life</label>
								<label id="omnr"><input type="radio" name="group" value="omnr" data-type="2">Firetactics</label>
								<label id="cpc"><input type="radio" name="group" value="cpc" data-type="3">Adaptive Sports</label>
								<label id="st"><input type="radio" name="group" value="st" data-type="4">connectED</label>
								<label id="lt"><input type="radio" name="group" value="lt" data-type="5">LOTA</label>
								<label id="Teknion"><input type="radio" name="group" value="Teknion" data-type="6">Workspace Next</label>
							</div>
						</fieldset>
					    <fieldset id="fullnames">
							<legend>Sort by Name:</legend>
							<label class="focused">
								<input type="radio" name="sort" value="first" checked="checked">First</label>
							<label>
								<input type="radio" name="sort" value="last">Last</label>     
					    </fieldset>
					</div>
			    </div>
			  </div>
			</li>
			<li class="mainNav" id="alumni" title="Alumni">
			  <div class="nav" id="nav_alumni">
			  	<div class="content">
                	Alumni Night<br />APRIL 16TH, 2011, 5–8PM, UNIVERSITY CENTRE GALLERIA<br/><br/>
                    	<table width="700" border="0">
						  <tr>
  						 	 <td><center>
                             	<img src="images/Ostiguy.jpg"  /><br /><br /><br />
                                <img src="images/CSeal.png" width="120" height="120" alt="Cseal" /></center><br /><br />
                                Complimentary refreshments.<br/>
                                Free parking available in Lot P2.</td>
 						 	  <td width="490"><br /><br />
                              The School of Industrial Design and the Carleton University Alumni Association, Industrial Design 	Chapter, invite you to the annual Alumni Night, on April 16th, 2011 at 5PM, to honour the contributions of Jacques Ostiguy to the School of Industrial Design. Featuring presentations by Floyd Pushelberg and many others.<br/>
Please register at alumni.carleton.ca/events<br/>
	<img src="images/bar.jpg" alt="" width="490" height="3" /><br/>
<img src="images/map.jpg" width="490" height="237" alt="map" border='1' /></td>
						 </tr>
						</table>
                       	
			    </div>	  
			  </div>
			</li>
			<li class="mainNav" id="sponsor" >
			  <div class="nav" id="nav_sponsors" title="Sponsors">
			  		<div class="content">
                    	Sponsors + Thanks<br /><br />The School of Industrial Design and the 2010-11 Bachelor of Industrial Design graduating class would like to sincerely thank this year’s collaborators and sponsors for their contributions and support.          	
			    	</div>	  
			  	</div>  
			</li>
			<li class="mainNav" id="staff">
				<div class="nav" id="nav_staff" title="Staff and Supporters">
			  		<div class="content">
			        	Staff + Support<br /><br />In addition to their sponsors, the 2010-11 Bachelor of Industrial Design graduating class would like to also thank the faculty and staff at the School of Industrial Design.
                       	<br /><br />
                        <table width="700" border="0">
                          <tr>
                            <td  >FACULTY:<br />
                              Thomas GarveyDirector,<br /> School of Industrial Design<br />
                              Brian BurnsAssociate Professor,<br /> School of Industrial Design<br />
                              WonJoon ChungAssociate Professor,<br /> School of Industrial Design<br />
                              Stephen FieldInstructor,<br /> School of Industrial Design<br />
                              Lois FrankelAssociate Professor,<br /> School of Industrial Design<br />
                              Bjarki HallgrimssonAssociate Professor,<br /> School of Industrial Design<br />
                            Lorenzo ImbesiAssociate Professor,<br /> School of Industrial Design</td>
                            <td>STAFF:<br />
                              Diane SmythAdministrator,<br /> School of Industrial Design<br />
                              Valerie DaleyAdministrative Assistant,<br /> School of Industrial Design<br />
                              Walter ZanettiChief Technician,<br /> School of Industrial Design<br />
                              Jim DewarMachine Shop Technician,<br /> School of Industrial Design<br />
                              Terry FlahertyWood Shop Technician,<br /> School of Industrial Design<br />
                            Andrew PullinComputer Technician,<br /> School of Industrial Design</td>
                          </tr>
                          </table>
			    	</div>	  
			  	</div> 
			</li>
		</ul>
	</div>
</body>
</html>
