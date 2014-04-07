<?php
class Calendar extends DB_Connect
{
	private $_useDate;
	private $_m;
	private $_y;
	private $_daysInMonth;
	private $_startDay;
	public function __construct($dbo=NULL, $useDate=NULL)
	{
            parent::__construct($dbo);
            /*
            * 收集并储存该月有关的数据
            */
            if(isset($useDate))
            {
                    $this->_useDate = $useDate;
            }
            else
            {
                    $this->_useDate = date('Y-m-d H:i:s');
            }
            
            /*
            * 把日期转化成时间戳，确定日历要显示的年和月
            */
            /* @var $ts type */
            $ts1 = strtotime($this->_useDate);
            $this->_m = date('m', $ts1);
            $this->_y = date('Y', $ts1);
            
            /*
            * 确定这个月有多少天
            */
            $this->_daysInMonth = cal_days_in_month( CAL_GREGORIAN, $this->_m, $this->_y);
            
            /*
            * 确定一个月从周几开始
            */
            $ts2 = mktime(0, 0, 0, $this->_m, 1,  $this->_y);
            $this->_startDay = date('w',$ts2);
	} 
}
?>