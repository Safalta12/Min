public class App {
    public static void main(String[] args) throws Exception {
       BaseClass b=new Ram();
       BaseClass b1=new Shiva();
       b.GodName();
       b1.GodName();
    }
}
class BaseClass
{
    public void GodName()
    {
        System.out.println("I am God");
    }
}
class Ram extends BaseClass
{
    public void GodName()
    {
        System.out.println("I am Ram");
    }
}
class Shiva extends BaseClass
{
    public void GodName()
    {
        System.out.println("I am Shiva");
    }
}