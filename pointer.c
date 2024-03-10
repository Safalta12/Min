#include<stdio.h>
int main()
{
    int arr[100],n,*ptr,sum=0;
    printf("Enter the numbers of elements in the array:");
    scanf("%d",&n);
    printf("Enter %d integer:\t",n);
    for(ptr=arr;ptr<arr+n;ptr++)
    {
        scanf("%d",ptr);
        sum+=*ptr;
    }
    printf("The sum of all elements in the array is :%d\n",sum);
    return 0;
}