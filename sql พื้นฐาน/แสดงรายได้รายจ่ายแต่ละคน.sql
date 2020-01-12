SELECT 
	user_name, 
	user_sname,
	(
		SELECT IFNULL(SUM(income_amount), 0) FROM income WHERE income.user_id=`user`.user_id
	) as sum_income,
	(
		SELECT IFNULL(SUM(widthdraw_amount), 0) FROM widthdraw WHERE widthdraw.user_id=`user`.user_id
	) as sum_widthdraw,
	((
		SELECT IFNULL(SUM(income_amount), 0) FROM income WHERE income.user_id=`user`.user_id
	) -
	(
		SELECT IFNULL(SUM(widthdraw_amount), 0) FROM widthdraw WHERE widthdraw.user_id=`user`.user_id
	)) as balance
FROM `user`