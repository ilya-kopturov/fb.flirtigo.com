{if $error}
	<table class="error">
		<tr>
			<td class="h_error">
				<div class="errorTextBig">ERROR</div>
				<div class="errorTextSmall">{$error}</div>
			</td>
		</tr>
	</table>
{elseif $msg}
	<table class="success">
		<tr>
			<td class="h_error">
				<div class="successTextBig">SUCCESS</div>
				<div class="successTextSmall">{$msg}</div>
			</td>
		</tr>
	</table>
{/if}