{include file='header.tpl'}
{include file='navbar.tpl'}

<div class="ui stackable grid">
	<div class="ui centered row">


		{if count($WIDGETS_LEFT)}
			<div class="ui six wide tablet four wide computer column">
				{foreach from=$WIDGETS_LEFT item=widget}
					{$widget}
				{/foreach}
			</div>
		{/if}

		<div
			class="ui {if count($WIDGETS_LEFT) && count($WIDGETS_RIGHT) }four wide tablet eight wide computer{elseif count($WIDGETS_LEFT) || count($WIDGETS_RIGHT)}ten wide tablet twelve wide computer{else}sixteen wide{/if} column">


			{if isset($SUCCESS)}
				<div class="ui success icon message">
					<i class="check icon"></i>
					<div class="content">
						{$SUCCESS}
					</div>
				</div>
			{/if}

			{if isset($ERRORS)}
				<div class="ui negative icon message">
					<i class="x icon"></i>
					<div class="content">
						{foreach from=$ERRORS item=error}
							{$error}<br />
						{/foreach}
					</div>
				</div>
			{/if}


			{if $VALIDATION != true}
				<p class="ui yellow center aligned header">{$VALIDATION_INFO} {$VALIDATION_CODE}</p>
				<p class="ui yellow center aligned header">{$IS_VALIDATION}</p>
			{else}
				<p class="ui green center aligned header">{$VERIFITED}</p>
			{/if}


		</div>
	</div>
</div>


{include file='footer.tpl'}