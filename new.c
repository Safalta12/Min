#include<stdio.h>
int main(){
    int l,km,m,cm,mm;
    printf("Enter the length in mm:");
    scanf("%d",&l);
    km=l/1000000;
    m=(l%1000000)/1000;
    cm=(l%1000)/10;
    mm=l%10;
    printf("The converted length is %dkm,%dm,%dcm,%dmm",km,m,cm,mm);
    return 0;
}