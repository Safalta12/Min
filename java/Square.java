import javax.swing.*;
import java.awt.event.*;
public class Square implements ActionListener{
    JFrame f=new JFrame();
    JTextField inputField;
    JButton calculateButton;
    JTextField outputField;
    public Square(){
        f.setTitle("Square Calculator");
        JLabel inputLabel=new JLabel("Enter any number:");
        inputLabel.setBounds(20, 20, 200,25);
        inputField=new JTextField();
        inputField.setBounds(200, 20, 150, 25);
        f.add(inputLabel);
        f.add(inputField);
        calculateButton=new JButton("Calculate Square");
        calculateButton.setBounds(200, 60, 150, 25);
        f.add(calculateButton);
        JLabel outputLabel=new JLabel("Square of Entered Number:");
      outputLabel.setBounds(20, 100, 200,25);
        outputField=new JTextField();
     outputField.setBounds(200, 100, 150, 25);
     calculateButton.addActionListener(this);
        f.add(outputLabel);
        f.add(outputField);
        f.setSize(400,500);
        f.setLayout(null);
        f.setVisible(true);
    }
    @Override
    public void actionPerformed(ActionEvent e){
        int number=Integer.parseInt(inputField.getText());
        int Square=number*number;
        outputField.setText(String.valueOf(Square));
    }
    public static void main(String[] args) {
        new Square();
    }
}
