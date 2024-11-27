#include<stdio.h>
int reverseNumber(int num,int reversed){
    if(num==0)
    return reversed;
    int lastDigit=num%10;
    reversed=reversed*10+lastDigit;
    return reverseNumber(num/10,reversed);
}
int main(){
    int num,reversed;
    printf("Enter an integer");
    scanf("%d",&num);
    reversed=reverseNumber(num,0);
    printf("reversed number:%d\n",reversed);
    return 0;
}