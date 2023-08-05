package fumantes;
import java.util.Random;

public class Test {

			public class Agente extends Thread{
				private boolean fumo;
				private boolean papel;	
				private boolean fosforos;	
				private int sorteio;
				
				public void Agente() {
					
					//fumo = 0
					//papel= 1
					//fosfuro= 2
					fumo= false;
					papel = false;
					fosforos = false;
				}
				public boolean temFumo() {
					return fumo;
				}
				public boolean temFosforos() {
					return fosforos;
				}
				public boolean temPapel() {
					return papel;
				}
				public void consomeFumo() {
					fumo= false;
				}
				public void consomeFosforos() {
					fosforos=false;
				}
				public void consomePapel() {
					papel=false;
				} 
				@Override
				public void run() {
					while (true) {
						try {
							Sorteio();
							Thread.sleep(1000);
						} catch (InterruptedException ex) {
							System.out.println(ex);				
							}
					}
				}
				public void Sorteio() throws InterruptedException{
					Random r = new Random();
					sorteio = r.nextInt(3);
					if (sorteio == 0) {
						System.out.println("O agente colocou na mesa : Papel e Fosforos");
						fumo = false;
						papel = true;
						fosforos = true;
					}else if (sorteio==1) {
						System.out.println("O agente colocou na mesa : Fumo e Fosforos");
						fumo = true;
						papel = false;
						fosforos = true;
					}else if(sorteio==2) {
						System.out.println("O agente colocou na mesa : Papel e Fumo");
						fumo = true;
						papel = true;
						fosforos = false;
					}
				}
				}
			final Agente ag= new Agente();
			
			
			public class Fumantes extends Thread {
				//fumo = 0
				//papel= 1
				//fosfuro= 2
				private int ingredientes;
				private Ingredientes ingrediente = new Ingredientes();
				private String nome;
				
				public Fumantes (String nome, int ingredientes) {
					this.nome=nome;
					this.ingredientes = ingredientes;
					if (ingredientes == 0) {
						System.out.println("O fumante "+ nome + "Esta com o ingrediente FUMO");
					}else if(ingredientes==1) {
						System.out.println("O fumante "+ nome + "Esta com o ingrediente PAPEL");
					}else if(ingredientes==2) {
						System.out.println("O fumante "+ nome + "Esta com o ingrediente FOSFORO");
					}
				}
				@Override
				public void run() {
					while(true) {
						if(ag.temFumo() && ag.temPapel()&& ingredientes==2) {
							System.out.println("O fumante que tem Foforos Fumou");
							ag.consomeFumo();
							ag.consomePapel();
						}else if(ag.temPapel() && ag.temFosforos()&& ingredientes==0) {
							System.out.println("O fumante que tem FUMO Fumou");
							ag.consomePapel();
							ag.consomeFosforos();
							}
						else if(ag.temFumo() && ag.temFosforos()&& ingredientes==1) {
							System.out.println("O fumante que tem PAPEL Fumou");
							ag.consomeFumo();
							ag.consomeFosforos();
							}
						try {
							Thread.sleep(100);
						} catch(InterruptedException ex){
							System.out.println(ex);
							}
						}
				}
				
			}
			public void test() {
				Fumantes fumante1 = new Fumantes("Lucas",0);
				Fumantes fumante2 = new Fumantes("Natan",1);
				Fumantes fumante3 = new Fumantes("Bastos",2);
				new Thread(ag).start();
				
				new Thread(fumante1).start();
				new Thread(fumante2).start();
				new Thread(fumante3).start();
			}
}
