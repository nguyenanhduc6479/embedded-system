#include <mysql.h>
#include <stdio.h>
#include <stdlib.h> 
#define Sample_Rate 25
#define Config 26
#define Gyro_Config 27
#define Acc_Config 28
#define Interrupt_Enable 56
#define Power_Managment 107
int main(void)
{
    MYSQL *conn;
    MYSQL_RES *res;
    MYSQL_ROW row;
    char *server = "127.0.0.1";
    char *user = "dan";
    char *password = "654183"; 
    char *database = "kt";
    while(1)
    {
        conn = mysql_init(NULL);
        mysql_real_connect(conn,server,user,password,database,0,NULL,0); 

        char sql[200];
        sprintf(sql, "select * from caidat where STT=(select max(STT) from caidat)");
        mysql_query(conn,sql);
        res = mysql_store_result(conn); 
        row = mysql_fetch_row(res);
        if (atoi(row[7])==1)
        {
            printf("STT: %s\n",row[0]);
            printf("sample_rate: %s\n",row[1]);
            printf("config: %s\n",row[2]);
            printf("gyro_config: %s\n",row[3]);
            printf("acc_config: %s\n",row[4]);
            printf("interrupt_enable: %s\n",row[5]);
            printf("pwr_managment: %s\n",row[6]);
        }
        sprintf(sql, "update caidat set isUpdated=0");
        mysql_query(conn,sql);
        mysql_close(conn);
    }
    return 0;
}