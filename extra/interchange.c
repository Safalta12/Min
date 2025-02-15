#include<stdio.h>
int main()
{
    int n1,n2,temp;
    printf("n1");
    scanf("%d",n1);
    printf("n2");
    scanf("%d",n2);
    temp=n1;
    n1=n2;
    n2=temp;
    printf("The number after interchanging the contents are n1=%d and n2=%d",n1,n2);
    return 0;
}
