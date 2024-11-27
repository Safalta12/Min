public class javaApp {
public static void main(String[] args) {
    Calculation cal=new Calculation(6, 7);
    System.out.println(cal.calculationArea());
    System.out.println(cal.calculationPerimeter(.));
}
    
}
interface Area{
    double calculationArea();
}
interface Perimeter{
    double calculationPerimeter();
}
class Calculation implements Area,Perimeter{
    private double length,breath;
    public Calculation(double l,double b){
        this.length=l;
        this.breath=b;
    }
    public double calculationArea(){
        return length*breath;
    }
    public double calculationPerimeter(){
        return 2*(length+breath);
    }
}