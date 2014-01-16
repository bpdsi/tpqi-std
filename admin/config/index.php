<?php
	$defaultTheme=getCfgValue("defaultTheme");
?>
<table class="table_01" style="margin-left: auto;margin-right: auto;">
	<tr>
		<td class="table_header table_topRadius">System Preference</td>
	</tr>
	<tr>
		<td style="padding: 5px;">
			<table>
				<tr>
					<td style="padding: 10px;"><img src="images/config.png" height="100"></td>
					<td style="vertical-align: top;padding: 10px;">
						<table>
							<tr>
								<td class="form_field">Default Template</td>
								<td class="form_input">
									<select id="defaultTheme">
										<option value="01"
											<?php
												if($defaultTheme["cfgValue"]=='01'){
													echo "selected";
												} 
											?>
										>01</option>
										<option value="02"
											<?php
												if($defaultTheme["cfgValue"]=='02'){
													echo "selected";
												} 
											?>
										>02</option>
									</select>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>			
		</td>
	</tr>
	<tr>
		<td class="table_footer"></td>
	</tr>
</table>
<script type="text/javascript">
	$('#defaultTheme').change(function(){
		$.post('admin/config/saveConfig.php',{
				cfgName: 'defaultTheme',
				cfgValue: $('#defaultTheme').val()
			},function(data){
				if(data=='complete'){
					window.open('?page=admin/config/index.php','_self');
				}
			}
		);
	});
</script>