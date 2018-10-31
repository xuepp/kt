<?php

//应用公共文件

//根据sql数据删除


function delonlinesql($store_code,$version){

	$sql="
		
		delete
	FROM
		master_mc_t_online_product
	WHERE
		STORE_CODE IN ($store_code)
	AND POS_CODE IN (
		SELECT
			POS_CODE
		FROM
			dicos_access
		WHERE
			VERSION_ID = $version
	)
	AND SALE_CHANNEl IN (
	SELECT ON_CHANNEL FROM dicos_channel WHERE ID = (SELECT CHANNEL_ID FROM dicos_version WHERE ID =$version)
	)
	";

	return $sql;


}	




//增加online表数据
function addonlinesql($store_code,$version){

	$sql="
	    INSERT INTO master_mc_t_online_product 
	    SELECT
	        UUID(),
	        `BRAND_CODE`,
	        $store_code,
	        `POS_CODE`,
	        `SALES_MIN_NUM`,
	        `SALES_MAX_NUM`,
	        `UNIT`,
	        `SALES_START_TIME`,
	        `SALES_END_TIME`,
	        `SALES_TIME_PART`,
	        `SALES_SPECIAL_TIME`,
	        `IS_WEEK_SALES`,
	        `ONLINE_SHOW_CN_NAME`,
	        `ONLINE_SHOW_EN_NAME`,
	        `PICTURE_PATH`,
	        `PICTURE_ALT`,
	        `PRODUCE_ONLINE_PRICE`,
	        `IS_WECHAT_ROOM_SALES`,
	        `IS_WECHAT_DELIVERY_SALES`,
	        `IS_ONLINE_PROPERTY`,
	        `IS_MEMBER_SALE`,
	        (SELECT ON_CHANNEL FROM dicos_channel WHERE ID = (SELECT CHANNEL_ID FROM dicos_version WHERE ID =$version)),
	        `PRODUCT_CN_DESCRIPTION`,
	        `PRODUCT_EN_DESCRIPTION`,
	        `PRODUCT_ONLINE_SHORTNAME`,
	        `CREATE_ID`,
	        `CREATE_TIME`,
	        `UPDATE_ID`,
	        `UPDATE_TIME`,
	        `DEL_FLAG`,
	        `PICTURE_NAME`,
	        `DISCOUNT`,
	        `VIP_DISCOUNT`
	    FROM
	        dicos_product
	    WHERE
	        POS_CODE IN (
	            SELECT
	                POS_CODE
	            FROM
	                dicos_access
	            WHERE
	                VERSION_ID = $version
	        ) ";

	        return $sql;

}