CREATE VIEW view_telecom_messages AS
SELECT operator_id ,operator.name as OPERATOR,st_year as `YEAR`,st_month as `MONTH`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=1 and movement_id=1) as `On Net SMS`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=1 and movement_id=2) as `On Net MMS`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=1 and movement_id=3) as `Outgoing SMS to Other Networks`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=1 and movement_id=5) as `Incoming SMS from other Networks`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=1 and movement_id=4) as `Outgoing MMS to Other Networks`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=1 and movement_id=6) as `Incoming MMS from Other Networks`, 

(select num from statistics_telecom_masseges where main_id=s.id and destination_id=2 and movement_id=3) as `Outgoing SMS to East Africa`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=2 and movement_id=5) as `Incoming SMS from East Africa`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=3 and movement_id=3) as `Outgoing SMS to Other International`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=3 and movement_id=5) as `Incoming SMS from Other International`,

(select num from statistics_telecom_masseges where main_id=s.id and destination_id=2 and movement_id=4) as `Outgoing MMS to East Africa`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=2 and movement_id=6) as `Incoming MMS from East Africa`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=3 and movement_id=4) as `Outgoing MMS to Other International`,
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=3 and movement_id=6) as `Incoming MMS from Other International`


FROM statistics_telecom_main s inner join operator on operator.id=s.operator_id  
where 
(select num from statistics_telecom_masseges where main_id=s.id and destination_id=1 and movement_id=1) is not null;

--------------------------------------------------------------
CREATE VIEW view_telecom_base AS
SELECT operator_id ,operator.name as OPERATOR,st_year as `YEAR`,st_month as `MONTH`,
(select num from statistics_telecom_base where main_id=s.id and  service_id=1) as `VOICE MOBILE - PREPAID`,
(select num from statistics_telecom_base where main_id=s.id and  service_id=2) as `VOICE MOBILE - POSTPAID`,
(select num from statistics_telecom_base where main_id=s.id and  service_id=3) as `VOICE FIXED - PREPAID`,
(select num from statistics_telecom_base where main_id=s.id and service_id=4) as `VOICE FIXED - POSTPAID`,
(select num from statistics_telecom_base where main_id=s.id and service_id=5) as `PUBLIC ACCESS - POINTS`

FROM statistics_telecom_main s inner join operator on operator.id=s.operator_id  
where 
(select num from statistics_telecom_base where main_id=s.id and  service_id=1) is not null;

-------------------------------------------------------------------------
CREATE VIEW view_telecom_traffic AS
SELECT operator_id ,operator.name as OPERATOR,st_year as `YEAR`,st_month as `MONTH`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=1 and movement_id=1) as `On Net`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=1 and movement_id=2) as `Outgoing to other Mobile`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=1 and movement_id=3) as `Outgoing to other Fixed`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=1 and movement_id=4) as `Incoming from other Mobile`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=1 and movement_id=5) as `Incoming from other Fixed`, 

(select num from statistics_telecom_traffic where main_id=s.id and destination_id=2 and movement_id=2) as `Outgoing to East Africe Mobile`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=2 and movement_id=3) as `Outgoing to East Africa Fixed`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=3 and movement_id=2) as `Outgoing to Other International Mobile`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=3 and movement_id=3) as `Outgoing to Other International Fixed`,

(select num from statistics_telecom_traffic where main_id=s.id and destination_id=2 and movement_id=4) as `Incoming from East Africe Mobile`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=2 and movement_id=5) as `Incoming from East Africe Fixed`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=3 and movement_id=4) as `Incoming from Other International Mobile`,
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=3 and movement_id=5) as `Incoming from Other International Fixed`


FROM statistics_telecom_main s inner join operator on operator.id=s.operator_id  
where 
(select num from statistics_telecom_traffic where main_id=s.id and destination_id=1 and movement_id=1) is not null;

