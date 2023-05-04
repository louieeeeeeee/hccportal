<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
<table  style="width:100%;float:left;font-size:15px;" class="table table-hover">
							<thead>
							  <tr>
								<th class="first">Time</th>
								<th>M</th>
								<th>W</th>
								<th>F</th>
								
							  </tr>
							</thead>
							
		<?php
				
				$query=mysqli_query($con,"select * from time where days='mwf' order by time_start")or die(mysqli_error());
					
				while($row=mysqli_fetch_array($query)){
						$id=$row['time_id'];
						$start=date("h:i a",strtotime($row['time_start']));
						$end=date("h:i a",strtotime($row['time_end']));
		?>
							  <tr >
								<td class="first"><?php echo $start."-".$end;?></td>
								<td><?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join faculty where day='m' and schedule.facultyid='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join faculty where day='m' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join faculty where day='m' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
										$query3=mysqli_query($con,"select * from subjects where subject = '".$row1['subject_code']."'")or die(mysqli_error($con));
										$row3=mysqli_fetch_array($query3);
											echo '
											<div class="show">
											<ul>
												<li class="options" style="display:'.$options.'">
													<span style="float:left;"><a href="sched_edit.php?id='.$id1.'" class="edit" title="Edit">Edit</a></span>
														<span class="action"><a href="#" id="'.$id1.'" class="delete" title="Delete">Remove</a></span>
												</li></ul>
											
											<ul style="background-color: '.$row3["subjcolor"].';">
											<li class="showme">
												<li>'.$row1["subject_code"].'</li>
												<li class="'.$displayc.'">'.$row1['cys'].'</li>
												<li class="'.$displaym.'">'.$row1['lastname'].', '.$row1['firstname'].'</li>										
												<li class="'.$displayr.'">Room '.$row1['room'].'</li>
													'.$displayrm.'
											</ul>';
										}	
									?>
								</td>
								<td><?php 
									if ($member<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join faculty where day='w' and schedule.facultyid='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join faculty where day='w' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join faculty where day='w' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query2);
										$count=mysqli_num_rows($query2);
										$id1=$row1['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm= "<li>$row1[remarks]</li>";
											
										
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											$query3=mysqli_query($con,"select * from subjects where subject = '".$row1['subject_code']."'")or die(mysqli_error($con));
										$row3=mysqli_fetch_array($query3);
											echo '
											<div class="show">
											<ul>
												<li class="options" style="display:'.$options.'">
													<span style="float:left;"><a href="sched_edit.php?id='.$id1.'" class="edit" title="Edit">Edit</a></span>
														<span class="action"><a href="#" id="'.$id1.'" class="delete" title="Delete">Remove</a></span>
												</li></ul>
											
											<ul style="background-color: '.$row3["subjcolor"].';">
											<li class="showme">
												<li>'.$row1["subject_code"].'</li>
												<li class="'.$displayc.'">'.$row1['cys'].'</li>
												<li class="'.$displaym.'">'.$row1['lastname'].', '.$row1['firstname'].'</li>										
												<li class="'.$displayr.'">Room '.$row1['room'].'</li>
													'.$displayrm.'
											</ul>';
										}	
									?>
								</td>
								<td><?php 
								if ($member<>"")
								{
									$query3=mysqli_query($con,"select * from schedule natural join faculty where day='f' and schedule.facultyid='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query3=mysqli_query($con,"select * from schedule natural join faculty where day='f' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query3=mysqli_query($con,"select * from schedule natural join faculty where day='f' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query3);
										$count=mysqli_num_rows($query3);
										$id1=$row1['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm= "<li>$row1[remarks]</li>";
											
										else
											$displayrm="";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											$query3=mysqli_query($con,"select * from subjects where subject = '".$row1['subject_code']."'")or die(mysqli_error($con));
										$row3=mysqli_fetch_array($query3);
											echo '
											<div class="show">
											<ul>
												<li class="options" style="display:'.$options.'">
													<span style="float:left;"><a href="sched_edit.php?id='.$id1.'" class="edit" title="Edit">Edit</a></span>
														<span class="action"><a href="#" id="'.$id1.'" class="delete" title="Delete">Remove</a></span>
												</li></ul>
											
											<ul style="background-color: '.$row3["subjcolor"].';">
											<li class="showme">
												<li>'.$row1["subject_code"].'</li>
												<li class="'.$displayc.'">'.$row1['cys'].'</li>
												<li class="'.$displaym.'">'.$row1['lastname'].', '.$row1['firstname'].'</li>										
												<li class="'.$displayr.'">Room '.$row1['room'].'</li>
													'.$displayrm.'
											</ul>';
										}	
									?>
								</td>
								
							  </tr>
							
		<?php }?>					  
		</table>    
		</div>
    <div class="carousel-item">
			<table  style="width:100%;float:left;font-size:15px;" class="table table-hover">
								<thead>
								   <br> <br> <br> <br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
								  <tr>
									<th class="first"  style="width:25%;">Time</th>
									<th>T</th>
									<th>TH</th>
									<th>S</th>
								  </tr>
								</thead>
								
			<?php
					
					$query=mysqli_query($con,"select * from time where days='tth' order by time_start")or die(mysqli_error());
						
					while($row=mysqli_fetch_array($query)){
							$id=$row['time_id'];
							$start=date("h:i a",strtotime($row['time_start']));
							$end=date("h:i a",strtotime($row['time_end']));
			?>
								  <tr >
								<td class="first" ><?php echo $start."-".$end;?></td>
								<td class="sec"  style="width:25%;">
								<?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join faculty where day='t' and schedule.facultyid='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join faculty where day='t' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join faculty where day='t' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query1);
										$count=mysqli_num_rows($query1);
										$id1=$row1['sched_id'];
										
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm= "<li>$row1[remarks]</li>";
											
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											$query3=mysqli_query($con,"select * from subjects where subject = '".$row1['subject_code']."'")or die(mysqli_error($con));
										$row3=mysqli_fetch_array($query3);
											echo '
											<div class="show">
											<ul>
												<li class="options" style="display:'.$options.'">
													<span style="float:left;"><a href="sched_edit.php?id='.$id1.'" class="edit" title="Edit">Edit</a></span>
														<span class="action"><a href="#" id="'.$id1.'" class="delete" title="Delete">Remove</a></span>
												</li></ul>
											
											<ul style="background-color: '.$row3["subjcolor"].';">
											<li class="showme">
											<li>'.$id1.'</li>
												<li>'.$row1["subject_code"].'</li>
												<li class="'.$displayc.'">'.$row1['cys'].'</li>
												<li class="'.$displaym.'">'.$row1['lastname'].', '.$row1['firstname'].'</li>										
												<li class="'.$displayr.'">Room '.$row1['room'].'</li>
													'.$displayrm.'
											</ul>';
										}	
									?>
								</td>
								<td class="sec"  style="width:25%;"><?php 
								if ($member<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join faculty where day='th' and schedule.facultyid='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join faculty where day='th' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join faculty where day='th' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query2);
										$count=mysqli_num_rows($query2);
										$id1=$row1['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row2['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm1= "<li>$row1[remarks]</li>";
											
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											$query3=mysqli_query($con,"select * from subjects where subject = '".$row1['subject_code']."'")or die(mysqli_error($con));
										$row3=mysqli_fetch_array($query3);
											echo '
											<div class="show">
											<ul>
												<li class="options" style="display:'.$options.'">
													<span style="float:left;"><a href="sched_edit.php?id='.$id1.'" class="edit" title="Edit">Edit</a></span>
														<span class="action"><a href="#" id="'.$id1.'" class="delete" title="Delete">Remove</a></span>
												</li></ul>
											
											<ul style="background-color: '.$row3["subjcolor"].';">
											<li class="showme">
												<li>'.$row1["subject_code"].'</li>
												<li class="'.$displayc.'">'.$row1['cys'].'</li>
												<li class="'.$displaym.'">'.$row1['lastname'].', '.$row1['firstname'].'</li>										
												<li class="'.$displayr.'">Room '.$row1['room'].'</li>
													'.$displayrm.'
											</ul>';
										}	
									?>
								</td>
								<td class="sec"  style="width:25%;"><?php 
								if ($member<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join faculty where day='s' and schedule.facultyid='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join faculty where day='s' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query2=mysqli_query($con,"select * from schedule natural join faculty where day='s' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1=mysqli_fetch_array($query2);
										$count=mysqli_num_rows($query2);
										$id1=$row1['sched_id'];
										//$count=mysqli_num_rows($query1);
										$encode=$row2['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>"")
											$displayrm1= "<li>$row1[remarks]</li>";
											
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											$query3=mysqli_query($con,"select * from subjects where subject = '".$row1['subject_code']."'")or die(mysqli_error($con));
										$row3=mysqli_fetch_array($query3);
											echo '
											<div class="show">
											<ul>
												<li class="options" style="display:'.$options.'">
													<span style="float:left;"><a href="sched_edit.php?id='.$id1.'" class="edit" title="Edit">Edit</a></span>
														<span class="action"><a href="#" id="'.$id1.'" class="delete" title="Delete">Remove</a></span>
												</li></ul>
											
											<ul style="background-color: '.$row3["subjcolor"].';">
											<li class="showme">												<li>'.$row1["subject_code"].'</li>
												<li class="'.$displayc.'">'.$row1['cys'].'</li>
												<li class="'.$displaym.'">'.$row1['lastname'].', '.$row1['firstname'].'</li>										
												<li class="'.$displayr.'">Room '.$row1['room'].'</li>
													'.$displayrm.'
											</ul>';
										}	
									?>
								</td>
								
							  </tr>
			
			<?php }?>					  
			</table>
			</div>
			</div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

			