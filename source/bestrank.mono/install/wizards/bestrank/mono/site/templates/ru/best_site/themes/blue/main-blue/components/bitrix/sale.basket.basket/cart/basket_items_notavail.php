<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="cart-items" id="id-na-list" style="display:none;">
	<div class="sort">
		<div class="sorttext"><?=GetMessage("SALE_PRD_IN_BASKET")?></div>
		<a href="javascript:void(0)" onclick="ShowBasketItems(1);" class="sortbutton"><?=GetMessage("SALE_PRD_IN_BASKET_ACT")?> (<?=count($arResult["ITEMS"]["AnDelCanBuy"])?>)</a>
		<?if ($countItemsDelay=count($arResult["ITEMS"]["DelDelCanBuy"])):?>		<a href="javascript:void(0)" onclick="ShowBasketItems(2);" class="sortbutton"><?=GetMessage("SALE_PRD_IN_BASKET_SHELVE")?> (<?=$countItemsDelay?>)</a><?endif?>
		<?if ($countItemsSubscribe=count($arResult["ITEMS"]["ProdSubscribe"])):?><a href="javascript:void(0)" onclick="ShowBasketItems(3);" class="sortbutton"><?=GetMessage("SALE_PRD_IN_BASKET_SUBSCRIBE")?> (<?=$countItemsSubscribe?>)</a><?endif?>
		<a href="javascript:void(0)" class="sortbutton current"><?=GetMessage("SALE_PRD_IN_BASKET_NOTA")?></a>
	</div>
	<?if(count($arResult["ITEMS"]["nAnCanBuy"]) >0):?>
	<table class="equipment" rules="rows" ">
	<thead>
		<tr>
			<?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-name"><?= GetMessage("SALE_NAME")?></td>
				<td></td><td></td>
				<?$numCells += 3;?>
			<?endif;?>
			<?if (in_array("TYPE", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-type"><?= GetMessage("SALE_PRICE_TYPE")?></td>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("DISCOUNT", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-discount"><?= GetMessage("SALE_DISCOUNT")?></td>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("WEIGHT", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-weight"><?= GetMessage("SALE_WEIGHT")?></td>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-price"><?= GetMessage("SALE_PRICE")?></td>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-quantity"><?= GetMessage("SALE_QUANTITY")?></td>
				<?$numCells++;?>
			<?endif;?>
		</tr>
	</thead>
	<tbody>
	<?
	foreach($arResult["ITEMS"]["nAnCanBuy"] as $arBasketItems)
	{
		?>
		<tr>
			<td  class="cart-item-img"><div class="cart-item-img-div">

				<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
					<a href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>">
				<?endif;?>
				<?if (strlen($arBasketItems["DETAIL_PICTURE"]["SRC"]) > 0) :?>
					<img src="<?=$arBasketItems["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arBasketItems["NAME"] ?>"/>
				<?else:?>
						<img src="<?=SITE_TEMPLATE_PATH?>/images/no-photo.png" alt="<?=$arBasketItems["NAME"] ?>" style="border:none;" />
				<?endif?>
				<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
					</a>
				<?endif;?>
			</div></td>
				<td class="cart-close">
					<?if (in_array("DELETE", $arParams["COLUMNS_LIST"])):?>
						<a class="close button" href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["delete"])?>"  title="<?=GetMessage("SALE_DELETE_PRD")?>"></a>

					<?endif;?>
				</td>

			<?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
			<td><?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
					<a href="<?=$arBasketItems["DETAIL_PAGE_URL"] ?>">
				<?endif;?>
				<?=$arBasketItems["NAME"] ?>
				<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
					</a>
				<?endif;?>
				<?if (in_array("PROPS", $arParams["COLUMNS_LIST"]))
				{
					foreach($arBasketItems["PROPS"] as $val)
					{
						echo "<br />".$val["NAME"].": ".$val["VALUE"];
					}
				}?>
			</td>
			<?endif;?>
			<?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-price">
					<?if(doubleval($arBasketItems["FULL_PRICE"]) > 0):?>
						<div class="discount-price"><?=$arBasketItems["PRICE_FORMATED"]?></div>
						<div class="old-price"><?=$arBasketItems["FULL_PRICE_FORMATED"]?></div>
					<?else:?>
						<div class="prices"><?=$arBasketItems["PRICE_FORMATED"];?></div>
					<?endif?>
				</td>
			<?endif;?>
			<?if (in_array("TYPE", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-type"><?=$arBasketItems["NOTES"]?></td>
			<?endif;?>
			<?if (in_array("DISCOUNT", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-discount"><?=$arBasketItems["DISCOUNT_PRICE_PERCENT_FORMATED"]?></td>
			<?endif;?>
			<?if (in_array("WEIGHT", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-weight"><?=$arBasketItems["WEIGHT_FORMATED"]?></td>
			<?endif;?>
			<?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-quantity"><?=$arBasketItems["QUANTITY"]?></td>
			<?endif;?>
		</tr>
		<?
	}
	?>
</tbody>
</table>
<?endif;?>
</div>