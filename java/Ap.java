import javax.swing.*;
import java.awt.event.*;
public class Ap implements ActionListener{
    JFrame f=new JFrame();
    JTextField firstDigit;
    JTextField secondDigit;
    JButton calculateButton;
    JTextField outputField;
    public Ap(){
        f.setTitle("Two Digit Calculator");
        JLabel firstDigitLabel=new JLabel("First Digit:");
        firstDigitLabel.setBounds(20,20,100,25);
        firstDigit=new JTextField();
        firstDigit.setBounds(140, 20, 100, 25);
        f.add(firstDigitLabel);
        f.add(firstDigit);

        JLabel secondDigitLabel=new JLabel("Second Digit:");
        secondDigitLabel.setBounds(20,60,100,25);
        secondDigit=new JTextField();
        secondDigit.setBounds(140, 60, 100, 25);
        f.add(secondDigitLabel);
        f.add(secondDigit);

        calculateButton=new JButton("Calculate");
        calculateButton.setBounds(140, 100, 100, 25);
        f.add(calculateButton);

        JLabel outputLabel=new JLabel("Sum:");
       outputLabel.setBounds(20,140,100,25);
        outputField=new JTextField();
       outputField.setBounds(140, 140, 100, 25);
       calculateButton.addActionListener(this);
        f.add(outputLabel);
        f.add(outputField);
        f.setSize(400,500);
        f.setLayout(null);
        f.setVisible(true);
    }
    @Override
    public void actionPerformed(ActionEvent e){
        int num1=Integer.parseInt(firstDigit.getText());
        int num2=Integer.parseInt(secondDigit.getText());
        int sum=num1+num2;
        outputField.setText(String.valueOf(sum));
    }
    public static void main(String[] args) {
        new Ap();
    }
    
}
