<?php
	session_start();
	$path="../";
	include "../function/functionPHP.php";
	if(authenticated()){
		header("location:../index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TPQI Authentication</title>
		<?php headMeta()?>
		<script type="text/javascript">
			$('document').ready(function(){
					$('#user').focus();
				}
			);
		</script>
	</head>
	<body style="background-color: #132743;">
		<img src="../images/header/tpqiDecoration.png"
			style="
				position: fixed;
				right: 0px;
				bottom: 10px;
				cursor: pointer;
				z-index: 1000;
			"
			onclick="window.open('http://www.tpqi.go.th/','_self')"
		>
		<div 
			style="
				margin-left: auto;
				margin-right: auto;
				background: #eee;
				width: 400px;
				height: 100%;
				box-shadow: 0px 0px 10px #000;
			"
		>
			<table style="height: 100%;width: 100%;">
				<tr>
					<td style="vertical-align: middle">
						<table style="margin-left: auto;margin-right: auto;">
							<tr>
								<td style="text-align: center;height: 200px;"><img src="../images/tpqiLogo.png"></td>
							</tr>
							<tr>
								<td>
									<table>
										<tr>
											<td style="font-weight: bold;font-size: 25px;text-align: center">Authentication System</td>
										</tr>
										<tr>
											<td>
												<form method="post" action="loginSQL.php">
													<table>
														<tr>
															<td>Username</td>
															<td>
																<input type="text" id="user" name="user" style="width: 150px;"
																	onkeypress="
																		if(event.keyCode==13){
																			$('#pass').focus();
																		}
																	"
																>
															</td>
														</tr>
														<tr>
															<td>Password</td>
															<td>
																<input type="password" id="pass" name="pass" style="width: 150px;"
																	onkeypress="
																		if(event.keyCode==13){
																			$('#submitButton').click();
																		}
																	"
																>
															</td>
														</tr>
														<tr>
															<td colspan="2">
																<input type="button" id="submitButton" value="Login" style="float: right;"
																	onclick="form.submit();"
																>
															</td>
														</tr>
													</table>
												</form>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>